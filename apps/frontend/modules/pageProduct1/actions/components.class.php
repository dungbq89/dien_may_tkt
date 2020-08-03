<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageProductComponents extends sfComponents
{
    public function executeProductRelated(sfWebRequest $request)
    {
        // lay danh sach san pham lien quan
        $products = VtpProductsTable::getProductByCatIdV2($this->getVar('catId'), 10);
        $this->products = $products;
    }

    public function executeInquiryNowForm(sfWebRequest $request){
        $form = new InquiryNowFront();
        $this->form = $form;
    }
}
