<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 7/28/15
 * Time: 11:33 PM
 */

class pageOrderActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $id = $request->getParameter('id',null);
        $user = sfContext::getInstance()->getUser();
        $user->setAttribute('idroom',$id);
        $form=new orderForm();

        if($request->isMethod('POST')){
            $values = $request->getParameter($form->getName());
            $form->bind($values,$request->getFiles($form->getName()));
            if($form->isValid()){
                $reg = new Booking();
                $reg->setFullName($values['full_name']);
                $reg->setPhone($values['phone']);
                $reg->setEmail($values['email']);
                $reg->setCategoryId($values['category_id']);
                $reg->setProductId($values['product_id']);
                if(!empty($values['from_time']['date'])){
                    $fromTime = $values['from_time']['date'];
                    $fromTime = DateTime::createFromFormat('d/m/Y', $fromTime);
                    $fromTime = $fromTime->format('Y-m-d');
                }else{
                    $fromTime = date('Y-m-d');
                }

                if(!empty($values['to_time']['date'])){
                    $toTime = $values['to_time']['date'];
                    $toTime = DateTime::createFromFormat('d/m/Y', $toTime);
                    $toTime = $toTime->format('Y-m-d');
                }else{
                    $toTime = date('Y-m-d');
                }
                $reg->setFromTime($fromTime);
                $reg->setToTime($toTime);
                $reg->setNumberPerson($values['number_person']);
                $reg->setNumberRoom($values['number_room']);
                $reg->setLang(sfContext::getInstance()->getUser()->getCulture());
                $reg->save();
                $this->getUser()->setFlash('success','Đặt phòng thành công, chúng tôi sẽ liên hệ vói bạn trong thời gian sớm nhất.');
                $form = new orderForm();
            }
        }
        $this->form=$form;
    }

}