<?php

require_once dirname(__FILE__) . '/../lib/adServiceGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/adServiceGeneratorHelper.class.php';

/**
 * adService actions.
 *
 * @package    symfony
 * @subpackage adService
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adServiceActions extends autoAdServiceActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $values = $request->getParameter($form->getName());
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
        $form->bind($values, $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $ad_product = $form->save();
                $slug = removeSignClass::removeSign($ad_product->getName());
                $objCat = count(AdProductTable::checkSlug($slug, $ad_product->getId()));
                while ($objCat > 0) {
                    $slug = $slug . '_' . VtHelper::generateString(5);
                    $objCat = count(AdProductTable::checkSlug($slug, $ad_product->getId()));
                }
                $ad_product->slug = $slug;
                $ad_product->save();
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $ad_product)));

            if ($request->hasParameter('_save_and_exit')) {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@ad_product');
            } elseif ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('success', $notice . ' You can add another one below.');

                $this->redirect('@ad_product_new');
            } else {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'ad_product_edit', 'sf_subject' => $ad_product));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
