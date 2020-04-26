<?php

/**
 * AdManageAttrProduct
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class AdManageAttrProduct extends BaseAdManageAttrProduct
{
    const ATTR_TYPE_CAT = 3;
    const ATTR_TYPE_PARENT = 1;
    const ATTR_TYPE_CHILD = 2;

    public function getListChildAttr()
    {
        return AdManageAttrTable::getAllAttr(false, $this->attr_id);
    }

    public function getObjAttr()
    {
        return AdManageAttrTable::getInstance()->findOneById($this->attr_id);
    }
}