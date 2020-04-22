<?php

/**
 * HqBrand form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HqBrandFormAdmin extends BaseHqBrandForm
{
    public function configure()
    {
        parent::setup();
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'lang' => new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getCulture())),
            'image' => new sfWidgetFormInputFileEditable(array(
                'label' => ' ',
                'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_advertise_images'), $this->getObject()->getImage()),
                'is_image' => true,
                'edit_mode' => !$this->isNew(),
                'template' => '<div>%file%<br />%input%</div>',
            )),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'slug' => new sfWidgetFormInputHidden(),
        ));

        $this->setValidators(array(
            'name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'image' => new sfValidatorFileViettel(
                array(
                    'max_size' => sfConfig::get('app_image_maxsize', 999999),
                    'mime_types' => array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'),
                    'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_advertise_images'),
                    'required' => false
                ),
                array(
                    'mime_types' => $i18n->__('Bạn phải tải lên file hình ảnh.'),
                    'max_size' => $i18n->__('Tối đa 5MB')
                )),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'slug' => new sfValidatorPass()
        ));

        $this->widgetSchema['priority'] = new sfWidgetFormInputText(array('default' => 0), array('size' => 5, 'maxlength' => 5));
        $this->validatorSchema['priority'] = new sfValidatorInteger(array('required' => false, "min" => 0, 'max' => 99999, 'trim' => true), array('min' => $i18n->__('Thứ tự phải là số nguyên dương'), 'max' => $i18n->__('Tối đa 5 ký tự'), 'invalid' => $i18n->__('Thứ tự phải là số nguyên dương')));

        $this->widgetSchema['description'] = new sfWidgetFormTextarea();
        $this->validatorSchema['description'] = new sfValidatorString(array('required' => false, 'trim' => true, 'max_length' => 1000));

        $this->widgetSchema['parent_id'] = new sfWidgetFormChoice(array(
            'choices' => $this->getParentByType($this->getObject()->get('id')),
            'multiple' => false,
            'expanded' => false
        ));
        $this->validatorSchema['parent_id'] = new sfValidatorChoice(array(
            'required' => FALSE,
            'choices' => array_keys($this->getParentByType($this->getObject()->get('id'))),
        ));

        $this->widgetSchema->setNameFormat('hq_brand[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    }


    protected function getParentByType($id)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arrBrand = ['' => $i18n->__('-- Chọn nhà cung cấp cha --')];
        $brands = HqBrandTable::getAllBrand();
        foreach ($brands as $brand) {
            if ($id != $brand->id) {
                $arrBrand[$brand->id] = $brand->name;
            }
        }
        return $arrBrand;
    }

}
