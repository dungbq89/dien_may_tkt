<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageHomeComponents extends sfComponents
{
    public function executeSlide(sfWebRequest $request)
    {
        $this->slide = AdAdvertiseTable::getAdvertiseV2('homepage');
    }

    public function executeDepartment($request)
    {
        $department = HqBrandTable::getBrandByParentID(null, 10);
        $data = array();
        if ($department && count($department)) {
            foreach ($department as $depart) {
                $departChild = HqBrandTable::getBrandByParentID($depart['id'], 10);
                $depart['childs'] = $departChild;
                $data[] = $depart;
            }
        }
        // lay danh sach attr theo slug
        $slug = $request->getParameter('slug');
        $listAttr = AdManageAttrProductTable::getListAttrByCat($slug);
        $arrFilter = [];
        $filter = trim($request->getParameter('filter'));
        if ($filter) {
            $arrFilter = explode(',', $filter);
        }

        $this->slug = $slug;
        $this->listAttr = $listAttr;
        $this->arrFilter = $arrFilter;
        $this->data = $data;
    }

    public function executeCategory($request)
    {
        $cats = VtpProductsCategoryTable::getCatByParentID(null, 10);
        $data = array();
        if ($cats && count($cats)) {
            foreach ($cats as $cat) {
                $catChild = VtpProductsCategoryTable::getCatByParentID($cat['id'], 10);
                $cat['childs'] = $catChild;
                $data[] = $cat;
            }
        }
        $this->data = $data;
    }

    public function executeSlideShow($request)
    {
        $this->slide = AdAdvertiseTable::getAdvertiseV2('homepage');
    }

    public function executeProductCategoryHot($request)
    {
        $data = array();
        $categoriesHot = VtpProductsCategoryTable::getListCategoryHome();
        if ($categoriesHot) {
            foreach ($categoriesHot as $category) {
                $productsHot = VtpProductsTable::getProductHotByCatId($category['id'], 20);
                $category['products'] = $productsHot;
                $data[] = $category;
            }
            $this->data = $data;
        } else {
            return sfView::NONE;
        }
    }

    public function executeService($request)
    {
        $service = AdProductTable::getAllService(1, 2);
        if (count($service)) {
            $this->services = $service;
        } else {
            return sfView::NONE;
        }
    }

    public function executeBrand($request)
    {

    }
}
