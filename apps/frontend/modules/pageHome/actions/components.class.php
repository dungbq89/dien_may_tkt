<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageHomeComponents extends sfComponents
{
    /**
     * danh sach san pham nav trang chu
     * @param sfWebRequest $request
     */
    public function executeNavSlideTop(sfWebRequest $request)
    {

    }

    public function executeMainProduct(sfWebRequest $request)
    {
        $catHome = VtpProductsCategoryTable::getCatHome(0);
        $arrData = [];
        if ($catHome) {
            // lay danh sach bai viet theo cat
            foreach ($catHome as $cat) {
                // lay sub cat
                $subCat = VtpProductsCategoryTable::getCatHome($cat->id, 4);
                $arrDataSub = [];
                if ($subCat) {
                    foreach ($catHome as $subCat) {
                        $arrDataSub[] = [
                            'id' => md5($subCat->id),
                            'title' => $subCat->name,
                            'slug' => $subCat->slug,
//                            'data' => AdArticleTable::getProductByCat($cat->id),
                        ];
                    }
                }
                $arrData[] = [
                    'id' => md5($cat->id),
                    'title' => $cat->name,
                    'slug' => $cat->slug,
                    'data' => VtpProductsTable::getProductByCat($cat->id, 5),
                    'subCat' => $arrDataSub,
                ];
            }
        }
        $this->arrData = $arrData;
    }

    public function executeNavNewHome(sfWebRequest $request)
    {
        // lay danh sach nav trang chu
        $catHome = VtpCategoryTable::getCatHome();
        $arrData = [];
        if ($catHome) {
            // lay danh sach bai viet theo cat
            foreach ($catHome as $cat) {
                $arrData[] = [
                    'id' => md5($cat->id),
                    'title' => $cat->name,
                    'slug' => $cat->slug,
                    'data' => AdArticleTable::getArticleByCat($cat->id),
                ];
            }
        }
        $this->arrData = $arrData;
    }


    public function executeNavProductPromotion(sfWebRequest $request)
    {
        $attrs = VtHelper::getProductAttr();
        $arrProducts = [];
        foreach ($attrs as $attr => $title) {
            $arrProducts[$attr] = [
                'title' => $title,
                'id' => md5($attr),
                'data' => VtpProductsTable::getProductByAttr($attr)
            ];
        }
        $this->arrProducts = $arrProducts;
    }

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
