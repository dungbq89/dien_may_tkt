<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 12/16/13
 * Time: 3:46 PM
 * To change this template use File | Settings | File Templates.
 */
class adServiceAdminForm extends BaseAdProductForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by'], $this['lang']);
        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'image_path' => new sfWidgetFormInputFileEditable(array(
                'label' => ' ',
                'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_product_images'), $this->getObject()->getImagePath()),
                'is_image' => true,
                'edit_mode' => !$this->isNew(),
                'template' => '<div>%file%<br />%input%</div>',
            )),
            'description' => new sfWidgetFormTextarea(array(), array('style' => 'width: 690px')),
            'content' => new sfWidgetFormCKEditor(
                array(
                    'jsoptions' => array('toolbar' => 'Basic',
                        'width' => '700',
                        'height' => '200'),
                )),
            'category_id' => new sfWidgetFormInputText(array(), array('size' => 5, 'maxlength' => 5)),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'lang' => new sfWidgetFormInputText(),
            'slug' => new sfWidgetFormInputHidden(),
        ));
        $this->setValidators(array(
            'name' => new sfValidatorString(array('max_length' => 255, 'trim' => true)),
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
            'description' => new sfValidatorString(array('max_length' => 1000, 'required' => false, 'trim' => true)),
            'content' => new sfValidatorString(array('required' => false, 'trim' => true)),
            'category_id' => new sfValidatorInteger(array('required' => false,
                'trim' => true,
                "min" => 0,
                "max" => 99999), array('min' => $i18n->__('Giá trị phải là kiểu số nguyên dương'), 'max' => $i18n->__('Không được nhập quá 5 ký tự'))),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 10)),
            'slug' => new sfValidatorPass()
        ));

        $this->widgetSchema->setNameFormat('ad_product[%s]');
    }


    private function doBindType(&$values)
    {
        $values['name'] = trim($values['name']);
        $values['description'] = trim($values['description']);
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
    }

    protected function doBind(array $values)
    {
        $this->doBindType($values);
        parent::doBind($values);
    }
}
