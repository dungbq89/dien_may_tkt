<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 12/16/13
 * Time: 3:46 PM
 * To change this template use File | Settings | File Templates.
 */
class vtManageProductsFormAdmin extends BaseVtpProductsForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by']);
        $arrBrand = $this->getAllBrand();
        $this->setWidgets(array(
//            'id' => new sfWidgetFormInputHidden(),
            'product_name' => new sfWidgetFormInputText(),
            'category_id' => new sfWidgetFormChoice(array(
                'choices' => $this->getCategory(),
                'multiple' => false,
                'expanded' => false
            )),
            'price' => new sfWidgetFormInputText(array(), array('size' => 10, 'maxlength' => 10)),
            'price_promotion' => new sfWidgetFormInputText(array(), array('size' => 10, 'maxlength' => 10)),
            'image_path' => new sfWidgetFormInputFileEditable(array(
                'label' => ' ',
                'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_product_images'), $this->getObject()->getImagePath()),
                'is_image' => true,
                'edit_mode' => !$this->isNew(),
                'template' => '<div>%file%<br />%input%</div>',
            )),
            'link' => new sfWidgetFormInputText(array(), array('style' => 'width: 690px')),
            'description' => new sfWidgetFormTextarea(array(), array('style' => 'width: 690px')),
            'content' => new sfWidgetFormCKEditor(
                array(
                    'jsoptions' => array('toolbar' => 'Basic',
                        'width' => '700',
                        'height' => '200'),
                )),
            'priority' => new sfWidgetFormInputText(array(), array('size' => 5, 'maxlength' => 5)),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'is_home' => new sfWidgetFormInputCheckbox(),
            'is_hot' => new sfWidgetFormInputCheckbox(),
            'lang' => new sfWidgetFormInputText(),
            'meta' => new sfWidgetFormTextarea(array(), array('style' => 'width:690px')),
            'keywords' => new sfWidgetFormTextarea(array(), array('style' => 'width:690px')),


            'brand' => new sfWidgetFormChoice(array(
                'choices' => $arrBrand,
                'multiple' => false,
                'expanded' => false
            )),
            'reference_price' => new sfWidgetFormInputText(),
            'unit' => new sfWidgetFormInputText(),
            'origin' => new sfWidgetFormInputText(),
            'payment' => new sfWidgetFormInputText(),
            'delivery' => new sfWidgetFormInputText(),
            'port' => new sfWidgetFormInputText(),
            'supply_ability' => new sfWidgetFormInputText(),
            'packing' => new sfWidgetFormInputText(),
            'special_req' => new sfWidgetFormInputText(),

        ));
        $this->setValidators(array(
//            'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'product_name' => new sfValidatorString(array('max_length' => 255, 'trim' => true)),

            'category_id' => new sfValidatorChoice(array(
                'required' => true,
                'choices' => array_keys($this->getCategory()),)),
            'price' => new sfValidatorInteger(array('required' => false, 'trim' => true, "min" => 0, "max" => 9999999999), array('min' => $i18n->__('Giá trị phải là kiểu số nguyên dương'), 'invalid' => $i18n->__('Giá trị phải là kiểu số nguyên dương'))),
            'price_promotion' => new sfValidatorInteger(array('required' => false, 'trim' => true, "min" => 0, "max" => 9999999999), array('min' => $i18n->__('Giá trị phải là kiểu số nguyên dương'), 'invalid' => $i18n->__('Giá trị phải là kiểu số nguyên dương'))),
            'image_path' => new sfValidatorFileViettel(
                array(
                    'validated_file_class' => 'sfResizeMediumThumbnailImage',
                    'max_size' => sfConfig::get('app_image_maxsize', 999999),
                    'mime_types' => array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'),
                    'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_product_images'),
                    'required' => false,
                ),
                array(
                    'mime_types' => $i18n->__('Dữ liệu không hợp lệ hoặc định dạng không đúng.'),
                    'max_size' => $i18n->__('Tối đa 5MB')
                )
            ),
            'link' => new sfValidatorString(array('max_length' => 255, 'trim' => true, 'required' => false)),
            'description' => new sfValidatorString(array('max_length' => 1000, 'required' => false, 'trim' => true)),
            'content' => new sfValidatorString(array('required' => false, 'trim' => true)),
            'priority' => new sfValidatorInteger(array('required' => false,
                'trim' => true,
                "min" => 0,
                "max" => 99999), array('min' => $i18n->__('Giá trị phải là kiểu số nguyên dương'), 'max' => $i18n->__('Không được nhập quá 5 ký tự'))),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'is_home' => new sfValidatorBoolean(array('required' => false)),
            'is_hot' => new sfValidatorBoolean(array('required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 10)),
            'meta' => new sfValidatorString(array('max_length' => 255, 'required' => false, 'trim' => true)),
            'keywords' => new sfValidatorString(array('max_length' => 255, 'required' => false, 'trim' => true)),

            'brand' => new sfValidatorChoice(array(
                'required' => true,
                'choices' => array_keys($arrBrand))),
            'reference_price' => new sfValidatorInteger(array('required' => false)),
            'unit' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'origin' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'payment' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'delivery' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'port' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'supply_ability' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'packing' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'special_req' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));
        $this->widgetSchema['portal_id'] = new sfWidgetFormInputText(array(), array('disabled' => 'false'));
        $this->validatorSchema['portal_id'] = new sfValidatorString(array('max_length' => 25, 'required' => false, 'trim' => true));

        $this->widgetSchema->setNameFormat('vtp_products[%s]');
    }

    protected function getCategory()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arrResult = array();
        $arrResult[''] = $i18n->__('--Chọn chuyên mục--');
        $lstCategory = VtpProductsCategoryTable::getListCategoryByPortal(sfContext::getInstance()->getUser()->getAttribute('portal', 0));
        foreach ($lstCategory as $item) {
            $arrResult[$item->id] = $item->name;
        }
        return $arrResult;
    }

    private function doBindType(&$values)
    {
        $values['portal_id'] = sfContext::getInstance()->getUser()->getAttribute('portal', 0);
        $values['product_name'] = trim($values['product_name']);
        $values['description'] = trim($values['description']);
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
    }

    protected function doBind(array $values)
    {
        $this->doBindType($values);
        parent::doBind($values);
    }

    public function getAllBrand()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arrBrand = ['' => $i18n->__('Chọn nhà cung cấp')];
        $brands = HqBrandTable::getAllBrand();
        foreach ($brands as $brand) {
            $arrBrand[$brand->id] = $brand->name;
        }
        return $arrBrand;

    }
}
