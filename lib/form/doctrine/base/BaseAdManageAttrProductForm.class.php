<?php

/**
 * AdManageAttrProduct form base class.
 *
 * @method AdManageAttrProduct getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdManageAttrProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdProduct'), 'add_empty' => false)),
      'attr_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdAttr'), 'add_empty' => false)),
      'attr_type'  => new sfWidgetFormInputText(),
      'lang'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdProduct'))),
      'attr_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdAttr'))),
      'attr_type'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ad_manage_attr_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdManageAttrProduct';
  }

}
