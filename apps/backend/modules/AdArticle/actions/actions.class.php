<?php

require_once dirname(__FILE__) . '/../lib/AdArticleGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/AdArticleGeneratorHelper.class.php';

/**
 * AdArticle actions.
 *
 * @package    symfony
 * @subpackage AdArticle
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdArticleActions extends autoAdArticleActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $values = $request->getParameter($form->getName());
//        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
        $form->bind($values, $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            try {
                $ad_article = $form->save();
                // xu ly luu
                $vals = $form->getValues();
//                $ad_article->lang = sfContext::getInstance()->getUser()->getCulture();
                $catIds = $values['cat_ids'];
                $ad_article->cat_ids = implode(',', $catIds);
                if ($ad_article->is_active == '2' && $ad_article->published_time === null) {
                    $ad_article->published_time = date('Y-m-d H:i:s', time());
                }
                if ($vals['slug']) {
                    $slug = removeSignClass::removeSign($vals['slug']);
                } else {
                    $slug = removeSignClass::removeSign($ad_article->title);
                }

                if ($slug == '') {
                    $slug = VtHelper::generateString(5);
                }
                $objCat = count(AdArticleTable::checkSlug($slug, $ad_article->id));
                while ($objCat > 0) {
                    $slug = $slug . '_' . VtHelper::generateString(5);
                    $objCat = count(AdArticleTable::checkSlug($slug, $ad_article->id));
                }
                $ad_article->slug = $slug;
                if (!$form->getObject()->isNew()) {
                    $user = sfContext::getInstance()->getUser();
                    $ad_article->updated_at = date('Y-m-d H:i:s', time());
                    $ad_article->updated_by = $user->getGuardUser()->getId();
                }
                $ad_article->save();
                //xoa tin lien quan
                AdArticlesRelatedTable::deleteArticleRelated($ad_article->id);
                //ngoctv cap nhat tin lien quan

                if (!empty($vals['item_list'])) {
                    $itemlist = explode(',', $vals['item_list']);
                    if (is_array($itemlist)) {
                        foreach ($itemlist as $item) {
                            if ($item != '') {
                                $vtp_article_related = new AdArticlesRelated();
                                $vtp_article_related->article_id = $ad_article->id;
                                $vtp_article_related->related_article_id = $item;
                                $vtp_article_related->save();
                            }
                        }
                    }
                }
                // luu cat lien quan
                // xoa bai trong chuyen muc
                $data = [
                    'title' => $ad_article->title,
                    'header' => $ad_article->header,
                    'image' => $ad_article->image_path,
                    'slug' => $ad_article->slug,
                ];
                $arrCatInfo  = [];
                foreach ($catIds as $catId) {
                    AdMetaTable::deleteArticleMeta($ad_article->id, $catId);
                    $objCat = VtpCategoryTable::getInstance()->findOneById($catId);
                    $data['cat_slug'] = $objCat->slug;
                    $data['cat_name'] = $objCat->name;
                    $arrCatInfo[]=[
                        'slug' => $objCat->slug,
                        'title' => $objCat->name,
                    ];
                    // them thong tin
                    /** @var $objMeta  AdMeta * */
                    $objMeta = new AdMeta();
                    $objMeta->setProductId($ad_article->id);
                    $objMeta->setCatId($catId);
                    $objMeta->setMetaType(1);
                    $objMeta->setCatSlug($objCat->slug);
                    $objMeta->setProductStatus($ad_article->is_active);
                    $objMeta->setMetaData(json_encode($data));
                    $objMeta->save();
                }
                $ad_article->cat_slug = json_encode($arrCatInfo);
                $ad_article->save();
                // xu ly luu
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $ad_article)));

            if ($request->hasParameter('_save_and_exit')) {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@ad_article_AdArticle');
            } elseif ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('success', $notice . ' You can add another one below.');

                $this->redirect('@ad_article_AdArticle_new');
            } else {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'ad_article_AdArticle_edit', 'sf_subject' => $ad_article));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
