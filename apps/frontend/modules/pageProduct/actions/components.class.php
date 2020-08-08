<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageProductComponents extends sfComponents
{
    public function executeNavProductRg(sfWebRequest $request)
    {
        // lay danh sach san pham lien quan
        $catSlug = $request->getParameter('cat_slug');
        $products = false;
        if ($catSlug) {
            $products = VtpProductsTable::getProductByCatSlugAndAttr($catSlug, 1);
        }
        $this->articles = AdArticleTable::getArticleNew(5);
        $this->products = $products;
        $this->catSlug = $catSlug;
    }

    public function executeNavCat(sfWebRequest $request)
    {
        $mainMenu = VtpMenuTable::getMenu(0);
        $this->mainMenu = $mainMenu;
        $this->catSlug = $request->getParameter('slug');
        $this->products = VtpProductsTable::getProductByCatSlugAndAttr(false, 2);
    }

    public function executeProductRelated(sfWebRequest $request)
    {
        // lay danh sach san pham lien quan
//        $products = VtpProductsTable::getProductByCatIdV2($this->getVar('catId'), 10);
//        $this->products = $products;
    }
}
