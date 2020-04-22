<?php

/**
 * HqBrand form base class.
 *
 * @method HqBrand getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHqBrandForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'parent_id'   => new sfWidgetFormInputText(),
      'priority'    => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'lang'        => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'parent_id'   => new sfValidatorInteger(array('required' => false)),
      'priority'    => new sfValidatorInteger(array('required' => false)),
      'is_active'   => new sfValidatorBoolean(array('required' => false)),
      'lang'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'HqBrand', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('hq_brand[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HqBrand';
  }

}
