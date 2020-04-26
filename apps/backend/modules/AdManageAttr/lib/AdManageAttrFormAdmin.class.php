<?php

/**
 * AdManageAttr form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdManageAttrFormAdmin extends BaseAdManageAttrForm
{
    public function configure()
    {
        parent::setup();
        $arrParent = AdManageAttrTable::getAllAttrByCbx(false, 0, $this->getObject()->getId());
        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'parent' => new sfWidgetFormChoice(array(
                'choices' => $arrParent,
                'multiple' => false,
                'expanded' => false
            ), []),
            'status' => new sfWidgetFormInputCheckbox(),
            'priority' => new sfWidgetFormInputText(),
            'lang' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'name' => new sfValidatorString(array('max_length' => 255)),
            'parent' => new sfValidatorChoice(array(
                'required' => true,
                'choices' => array_keys($arrParent),
            )),
            'status' => new sfValidatorBoolean(array('required' => false)),
            'priority' => new sfValidatorInteger(array('required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
        ));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));
        $this->widgetSchema->setNameFormat('ad_manage_attr[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    protected function doBind(array $values)
    {
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
        parent::doBind($values);
    }

    public function checkValidator($validator, $values)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $error1 = "";
        if (!$this->isNew()) {
            if ($this->getObject()->getParent() == '0' && $this->getObject()->getId() == $values['parent']) {
                $error1 = new sfValidatorError($validator, $i18n->__('Thuộc tính cha không hợp lệ.'));
                throw new sfValidatorErrorSchema($validator, array('parent' => $error1));
            }
        }
        return $values;
    }
}
