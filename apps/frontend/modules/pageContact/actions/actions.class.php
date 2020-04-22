<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/13/15
 * Time: 11:17 PM
 */
class pageContactActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $form = new contactForm();
        $i18n = sfContext::getInstance()->getI18N();
        if($request->isMethod('POST')){
            $values = $request->getParameter($form->getName());
            $form->bind($values,$request->getFiles($form->getName()));
            if($form->isValid()){
                $reg = new AdFeedBack();
                $reg->setName($values['name']);
                $reg->setPhone($values['phone']);
                $reg->setEmail($values['email']);
                $reg->setTitle($values['title']);
                $reg->setMessage($values['message']);
                $reg->setLang(sfContext::getInstance()->getUser()->getCulture());
                $reg->save();
                $this->getUser()->setFlash('success',$i18n->__('Gửi liên hệ thành công.'));
                $form = new contactForm();
            }
        }
        $this->form=$form;
    }
}