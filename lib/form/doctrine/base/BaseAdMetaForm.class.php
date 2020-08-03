<?php

/**
 * AdMeta form base class.
 *
 * @method AdMeta getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdMetaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'product_id'     => new sfWidgetFormInputText(),
      'cat_id'         => new sfWidgetFormInputText(),
      'meta_type'      => new sfWidgetFormTextarea(),
      'cat_slug'       => new sfWidgetFormTextarea(),
      'product_status' => new sfWidgetFormTextarea(),
      'product_rate'   => new sfWidgetFormTextarea(),
      'product_price'  => new sfWidgetFormInputText(),
      'meta_data'      => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id'     => new sfValidatorInteger(),
      'cat_id'         => new sfValidatorInteger(),
      'meta_type'      => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'cat_slug'       => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'product_status' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'product_rate'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'product_price'  => new sfValidatorInteger(array('required' => false)),
      'meta_data'      => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ad_meta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdMeta';
  }

}
