<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageNewsComponents extends sfComponents
{
    public function executeNavNew(sfWebRequest $request)
    {
        $this->products = VtpProductsTable::getProductByCatSlugAndAttr(false, 2);
        $this->articles = AdArticleTable::getArticleNew(5);
    }
}
