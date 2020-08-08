<?php

/**
 * pageHome actions.
 *
 * @package    VTP2.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageNewsActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        // lay danh sach san pham theo cat
        $page = $request->getParameter('page', 1);
        $limit = 3;
        $pager = new sfDoctrinePager('AdArticle', $limit);
        $pager->setQuery(AdArticleTable::getArticleQuery('', []));
        $pager->setPage($page);
        $pager->init();
        $this->pager = $pager;
        $this->page = $page;
    }

    public function executeDetail(sfWebRequest $request)
    {
        
        $i18n = sfContext::getInstance()->getI18N();
        $slug = $request->getParameter('slug');
        $new = false;
        if ($slug) {
            // lay chi tiet san pham
            $new = AdArticleTable::getArticleBySlugV2($slug);
            if ($new) {
                $seoNew = VtSEO::getSeoArticle($new);
                if ($seoNew) {
                    $this->returnHtmlSeoPage($seoNew);
                }
                $this->new = $new;
            }
        }
        if (!$new) {
            $this->forward404($i18n->__('Page not found!'));
        }
    }

    //render meta tag
    public function returnHtmlSeoPage($seo_homepage)
    {
        $this->getResponse()->setTitle($seo_homepage['title']);
        $this->getResponse()->addMeta('description', $seo_homepage['description']);
        $this->getResponse()->addMeta('keywords', $seo_homepage['keywords']);
        $this->getResponse()->addMeta('og:url', $seo_homepage['og_url']);
        $this->getResponse()->addMeta('og:description', $seo_homepage['og_description']);
        $this->getResponse()->addMeta('og:image', $seo_homepage['og_image']);
        $this->getResponse()->addMeta('og:title', $seo_homepage['og_title']);
        $this->getResponse()->addMeta('og:site_name', $seo_homepage['og_site_name']);
        $this->getResponse()->addMeta('dc.title', $seo_homepage['dc_title']);
        $this->getResponse()->addMeta('dc.keywords', $seo_homepage['dc_keywords']);
        $this->getResponse()->addMeta('news_keywords', $seo_homepage['news_keywords']);
    }

}
