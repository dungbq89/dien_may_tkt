<?php

/**
 * VtpProductsCategory
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class VtpProductsCategory extends BaseVtpProductsCategory
{
    public function getCategoryByParent($limit = null)
    {
        return VtpProductsCategoryTable::getCategoryByParentID($this->getId(), $limit);
    }

    public function getParentName()
    {
        if ($this->getParentId()) {
            $obj = VtpProductsCategoryTable::getCategoryById($this->getParentId());
            if ($obj) {
                return $obj->name;
            }
        }
        return '';
    }

    public function getProductByCategory()
    {
        return VtpProductsTable::getProductByCatId($this->getId(), 6)->fetchArray();
    }

    public function getProductHomeByCategory($limit)
    {
        return VtpProductsTable::getProductHomeByCategory($this->getId(), $limit)->fetchArray();
    }

    public function getHasAttr()
    {
        return AdManageAttrProductTable::getArrAttrByProduct($this->getId(), AdManageAttrProduct::ATTR_TYPE_CAT);
    }
}