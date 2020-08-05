<?php

/**
 * AdManageAttr form base class.
 *
 * @method AdManageAttr getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdManageAttrForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'parent'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AdAttrParent'), 'add_empty' => true)),
      'status'     => new sfWidgetFormInputCheckbox(),
      'priority'   => new sfWidgetFormInputText(),
      'lang'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parent'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AdAttrParent'), 'required' => false)),
      'status'     => new sfValidatorBoolean(array('required' => false)),
      'priority'   => new sfValidatorInteger(array('required' => false)),
      'lang'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'AdManageAttr', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('ad_manage_attr[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdManageAttr';
  }

}
