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
//        $i18n = sfContext::getInstance()->getI18N();
//        // lay danh sach san pham theo cat
//        $slug = $request->getParameter('slug');
//        $page = $request->getParameter('page', 1);
//        $category = false;
//        $pager = false;
//        $limit = 9;
//        if ($slug && $page) {
//            $category = VtpProductsCategoryTable::getCategoryProductBySlugV3($slug);
//            if ($category) {
//                $seoCat = VtSEO::getSeoCategory($category);
//                if ($seoCat) {
//                    $this->returnHtmlSeoPage($seoCat);
//                }
//                $pager = new sfDoctrinePager('VtpProducts', $limit);
//                $filter = trim($request->getParameter('filter'));
//                if ($filter) {
//                    $listAttr = AdManageAttrTable::getAttrBySlug(explode(',', $filter));
//                    $pager->setQuery(VtpProductsTable::getAllProductByCategoryAttr($category->id, array_keys($listAttr)));
//                } else {
//                    $pager->setQuery(VtpProductsTable::getAllProductByCategory($category->id));
//                }
//
//                $pager->setPage($page);
//                $pager->init();
//            }
//        }
//        if ($category) {
//            $this->pager = $pager;
//            $this->category = $category;
//            $this->page = $page;
//        } else {
//            $this->forward404($i18n->__('Page not found!'));
//        }
    }

    public function executeBrand(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        // lay danh sach san pham theo cat
        $slug = $request->getParameter('slug');
        $page = $request->getParameter('page', 1);
        $category = false;
        $pager = false;
        $limit = 9;
        if ($slug && $page) {
            $category = HqBrandTable::getBrandBySlug($slug);

            if ($category) {
                $pager = new sfDoctrinePager('VtpProducts', $limit);
                $filter = trim($request->getParameter('filter'));
                if ($filter) {
                    $listAttr = AdManageAttrTable::getAttrBySlug(explode(',', $filter));
                    $pager->setQuery(VtpProductsTable::getAllProductByBrandAttr(array_keys($listAttr)));
                } else {
                    $pager->setQuery(VtpProductsTable::getAllProductByBrand($category->id));
                }
                $pager->setPage($page);
                $pager->init();
            }
        }
        if ($category) {
            $this->pager = $pager;
            $this->category = $category;
            $this->page = $page;
        } else {
            $this->forward404($i18n->__('Page not found!'));
        }
    }

    public function executeDetail(sfWebRequest $request)
    {
//        $i18n = sfContext::getInstance()->getI18N();
//        $slug = $request->getParameter('slug');
//        $this->inquiryNowForm = new InquiryNowFront();
//        $product = false;
//        if ($slug) {
//            // lay chi tiet san pham
//            $product = VtpProductsTable::getProductbySlug($slug, 0);
//            if ($product) {
//                $seoCat = VtSEO::getSeoProductDetail($product);
//                if ($seoCat) {
//                    $this->returnHtmlSeoPage($seoCat);
//                }
//                $this->product = $product;
//            }
//        }
//        if (!$product) {
//            $this->forward404($i18n->__('Page not found!'));
//        }
    }

    public function executeSearch(sfWebRequest $request)
    {
        $this->queryName = $queryName = $request->getParameter('keyword');
        if ($queryName) {
            $this->keyword = $queryName;
            $this->url_paging = 'page_search';
            $this->page = $this->getRequestParameter('page', 1);
            $pager = new sfDoctrinePager('VtpProducts', 21);
            $pager->setQuery(VtpProductsTable::getSearchProduct($queryName));
            $pager->setPage($this->page);
            $pager->init();
            $this->pager = $pager;
            $this->listProduct = $pager->getResults();
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

    public function executeInquiryNow(sfWebRequest $request)
    {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $form = new InquiryNowFront();
        $values = $request->getParameter($form->getName());
        $form->bind(($values));
        $valid = 1;
        if ($form->isValid()) {
            $obj = new Booking();
            $obj->setFullName($values['full_name']);
            $obj->setPhone($values['phone']);
            $obj->setEmail($values['email']);
            $obj->setCountry($values['country']);
            $obj->setBody($values['body']);
//            $obj->setAddress($values['address']);
            $obj->setShippingTerm($values['shipping_term']);
//            $obj->setSubject($values['subject']);
            $obj->setRequirement($values['requirement']);
            $obj->setLang(sfContext::getInstance()->getUser()->getCulture());
            $obj->save();
            $valid = 0;
        }
        foreach ($form->getValidatorSchema() as $e) {
//            var_dump($e->getMessage());
        }
//        else {
        $html = $this->getPartial('pageProduct/inquiryNowForm', array('form' => $form, 'valid' => $valid));
//        }
        $arrReturn = [
            'errCode' => $valid,
            'html' => $html,
        ];
        return $this->renderText(json_encode($arrReturn));
    }

    public function executePageInquiryNow(sfWebRequest $request)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $slug = $request->getParameter('slug');
        $form = new InquiryNowFront();
        $product = false;
        if ($slug) {
            // lay chi tiet san pham
            $product = VtpProductsTable::getProductbySlug($slug, 0);
            if ($product) {
                $this->product = $product;
            }
        }
        if (!$product) {
            $this->forward404($i18n->__('Page not found!'));
        }
        $message = "";
        if ($request->isMethod('post')) {
            $values = $request->getParameter($form->getName());
            $form->bind(($values));
            if ($form->isValid()) {
                $obj = new Booking();
                $obj->setFullName($values['full_name']);
                $obj->setPhone($values['phone']);
                $obj->setEmail($values['email']);
                $obj->setCountry($values['country']);
                $obj->setBody($values['body']);
//                $obj->setAddress($values['address']);
                $obj->setShippingTerm($values['shipping_term']);
//                $obj->setSubject($values['subject']);
                $obj->setRequirement($values['requirement']);
                $obj->setLang(sfContext::getInstance()->getUser()->getCulture());
                $obj->save();
                $valid = 0;

                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'glovimex68@gmail.com';                 // SMTP username
                    $mail->Password = 'thanhcong6868';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to
                    //Recipients
                    $mail->setFrom('glovimex68@gmail.com', 'Glovimex');
                    $mail->addAddress('glovimex68@gmail.com');               // Name is optional
                    $mail->addReplyTo('glovimex68@gmail.com', 'Information');
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Order: ' . $product->product_name;
                    $content = '<b>Customer Name: </b>' . $values['full_name'] . '<br>';
                    $content .= '<b>Email: </b>' . $values['email'] . '<br>';
                    $content .= '<b>Phone: </b>' . $values['phone'] . '<br>';
                    $content .= '<b>Country: </b>' . $values['country'] . '<br>';
                    $content .= '<b>Requirement: </b>' . $values['requirement'] . '<br>';
                    $mail->Body = $content;
//                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                } catch (Exception $e) {
                }
            } else {
                $valid = 1;
            }
        }
        $this->form = $form;
        $this->valid = $valid;
    }

    public function executePopupInquiryNow(sfWebRequest $request)
    {
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        $form = new InquiryNowFront();
        $slug = $request->getParameter('slug');
        $product = false;
        $listImage = false;
        if ($slug) {
            $product = VtpProductsTable::getProductbySlug($slug, 0);
            if ($product) {
                $listImage = $product->getListImage();
            }
        }
        $html = $this->getPartial('pageProduct/inquiryNow', array('form' => $form,
            'product' => $product, 'listImage' => $listImage));
        $arrReturn = [
            'html' => $html,
        ];
        return $this->renderText(json_encode($arrReturn));
    }
}
