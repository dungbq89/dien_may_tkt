<?php

/**
 * pageHome actions.
 *
 * @package    VTP2.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageProductActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        // lay danh sach san pham theo cat
        $slug = $request->getParameter('slug');
        $orderby = $request->getParameter('orderby');
        $price_desc = '';
        $price_asc = '';
        if ($orderby == 'price-desc') {
            $price_desc = 1;
        }
        if ($orderby == 'price') {
            $price_asc = 1;
        }
        $minPrice = $request->getParameter('min_price');
        $maxPrice = $request->getParameter('max_price');
        $rate_price = false;
//        if ($minPrice && $maxPrice) {
//            $rate_price = [$minPrice, $maxPrice];
//        }
        $page = $request->getParameter('page', 1);
        $category = false;
        $pager = false;
        $limit = 4;
        $start = (($page - 1) * $limit) + 1;
        $end = $page * $limit;
        if ($slug && $page) {
            $category = VtpProductsCategoryTable::getCategoryProductBySlugV3($slug);
            if ($category) {
                $seoCat = VtSEO::getSeoCategory($category);
                if ($seoCat) {
                    $this->returnHtmlSeoPage($seoCat);
                }
                $pager = new sfDoctrinePager('VtpProducts', $limit);
                $filter = [];
                if ($price_asc) {
                    $filter['price_asc'] = $price_asc;
                }
                if ($price_desc) {
                    $filter['price_desc'] = $price_desc;
                }
                if ($minPrice) {
                    $filter['minPrice'] = $minPrice;
                }
                if ($maxPrice) {
                    $filter['maxPrice'] = $maxPrice;
                }
                $pager->setQuery(VtpProductsTable::getProductQuery($slug, $filter));
                $pager->setPage($page);
                $pager->init();
            }
        }
        if ($category) {
            $this->pager = $pager;
            $this->slug = $slug;
            $this->category = $category;
            $this->page = $page;
            $this->minPrice = $minPrice;
            $this->maxPrice = $maxPrice;
            $this->orderby = $orderby;
            $this->start = $start;
            $this->end = $end;
        } else {
            $this->forward404($i18n->__('Page not found!'));
        }
    }

    public function executeDetail(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $slug = $request->getParameter('slug');
        $catSlug = $request->getParameter('cat_slug');
        $product = false;
        $cat = false;
        $productRelated = false;
        if ($slug && $catSlug) {
            // lay chi tiet san pham
            $product = VtpProductsTable::getProductbySlug($slug, 0);
            $cat = VtpProductsCategoryTable::getInstance()->findOneBySlug($catSlug);
            if ($cat) {
                $productRelated = VtpProductsTable::getProductByCat($cat->id);
            }
            if ($product) {
                $seoCat = VtSEO::getSeoProductDetail($product);
                if ($seoCat) {
                    $this->returnHtmlSeoPage($seoCat);
                }
            }
        }
        if (!$product) {
            $this->forward404($i18n->__('Page not found!'));
        }
        $this->product = $product;
        $this->cat = $cat;
        $this->catSlug = $catSlug;
        $this->productRelated = $productRelated;
    }

    public function executeSearch(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        // lay danh sach san pham theo cat
        $slug = '';
        $filter = [];
        $keyword = $request->getParameter('s');
        $orderby = $request->getParameter('orderby');
        $price_desc = '';
        $price_asc = '';
        if ($orderby == 'price-desc') {
            $price_desc = 1;
        }
        if ($orderby == 'price') {
            $price_asc = 1;
        }
        if ($keyword) $filter['product_name'] = $keyword;

        $minPrice = $request->getParameter('min_price');
        $maxPrice = $request->getParameter('max_price');
        $rate_price = false;
//        if ($minPrice && $maxPrice) {
//            $rate_price = [$minPrice, $maxPrice];
//        }
        $page = $request->getParameter('page', 1);
        $category = false;
        $limit = 4;
        $start = (($page - 1) * $limit) + 1;
        $end = $page * $limit;
        $pager = new sfDoctrinePager('VtpProducts', $limit);
        if ($price_asc) {
            $filter['price_asc'] = $price_asc;
        }
        if ($price_desc) {
            $filter['price_desc'] = $price_desc;
        }
        if ($minPrice) {
            $filter['minPrice'] = $minPrice;
        }
        if ($maxPrice) {
            $filter['maxPrice'] = $maxPrice;
        }
        $pager->setQuery(VtpProductsTable::getProductQuery($slug, $filter));
        $pager->setPage($page);
        $pager->init();
        $this->pager = $pager;
        $this->slug = $slug;
        $this->category = $category;
        $this->page = $page;
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
        $this->orderby = $orderby;
        $this->start = $start;
        $this->end = $end;
        $this->keyword = $keyword;
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

    public function executeBooking($request)
    {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $form = new BaseForm();
        $csrf = $request->getParameter('_csrf_token');
        $values['_csrf_token'] = $csrf;
        $form->bind($values);
        $name = $request->getParameter('name');
        $sdt = $request->getParameter('sdt');
        $email = $request->getParameter('email');
        $address = $request->getParameter('address');
        $total = $request->getParameter('qty');
        $totalPrice = $request->getParameter('total');
        $product_id = $request->getParameter('product_id');
        $objProduct = VtpProductsTable::getInstance()->findOneByIdAndIsActive($product_id, 1);
        $errCode = 1;
        if ($objProduct && $name && $sdt && $email && $form->isValid()) {
            $obj = new Booking();
            $obj->setFullName($name);
            $obj->setPhone($sdt);
            $obj->setEmail($email);
            $obj->setProductId($product_id);
            $obj->setBody(json_encode([
                'total' => $total,
                'price' => $totalPrice,
                'product_name' => $objProduct->product_name,
            ]));
            $obj->setAddress($address);
            $obj->setBookType(1);
            $obj->setTotal($total);
            $obj->setTotalPrice($totalPrice);
            $obj->setLang(sfContext::getInstance()->getUser()->getCulture());
            $obj->save();
            $errCode = 0;
        } else {
            $errCode = 2;
        }
        return $this->renderText(json_encode([
            'errorCode' => $errCode
        ]));
    }

    public function executeBookingContact($request)
    {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $form = new BaseForm();
        $csrf = $request->getParameter('_csrf_token');
        $values['_csrf_token'] = $csrf;
        $form->bind($values);
        $name = $request->getParameter('name');
        $sdt = $request->getParameter('sdt');
        $email = $request->getParameter('email');
        $title = $request->getParameter('title');
        $errCode = 1;
        if ($name && $sdt && $title && $email && $form->isValid()) {
            $obj = new Booking();
            $obj->setFullName($name);
            $obj->setPhone($sdt);
            $obj->setEmail($email);
            $obj->setBookType(2);
            $obj->setRequirement($title);
            $obj->setLang(sfContext::getInstance()->getUser()->getCulture());
            $obj->save();
            $errCode = 0;
        } else {
            $errCode = 2;
        }
        return $this->renderText(json_encode([
            'errorCode' => $errCode
        ]));
    }
}
