<?php

/**
 * VtpProducts
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class VtpProducts extends BaseVtpProducts
{
    public function getObjCategory()
    {
        return VtpProductsCategoryTable::getInstance()->findOneBy('id', $this->getCategoryId());
    }

    public function getListImage()
    {
        $listImage = VtpProductImageTable::getImagesByProductId($this->getId());
        if (!empty($listImage)) return $listImage;
        return false;
    }

    public function getObjBrand()
    {
        if ($this->brand) {
            return HqBrandTable::getBrandById($this->brand);
        }
        return false;
    }

    public function getAllListAttr()
    {
        return AdManageAttrTable::getAllAttrByCbx(1, 0);
    }

    public function getListAttrByProduct($attrType = 1)
    {
        return AdManageAttrProductTable::getListAttrByProduct($this->getId(), $attrType);
    }
}