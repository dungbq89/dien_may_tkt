<?php

/**
 * AdMeta filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAdMetaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cat_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'meta_type'      => new sfWidgetFormFilterInput(),
      'cat_slug'       => new sfWidgetFormFilterInput(),
      'product_status' => new sfWidgetFormFilterInput(),
      'product_rate'   => new sfWidgetFormFilterInput(),
      'product_price'  => new sfWidgetFormFilterInput(),
      'meta_data'      => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'product_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cat_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'meta_type'      => new sfValidatorPass(array('required' => false)),
      'cat_slug'       => new sfValidatorPass(array('required' => false)),
      'product_status' => new sfValidatorPass(array('required' => false)),
      'product_rate'   => new sfValidatorPass(array('required' => false)),
      'product_price'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'meta_data'      => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ad_meta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdMeta';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'product_id'     => 'Number',
      'cat_id'         => 'Number',
      'meta_type'      => 'Text',
      'cat_slug'       => 'Text',
      'product_status' => 'Text',
      'product_rate'   => 'Text',
      'product_price'  => 'Number',
      'meta_data'      => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
