<?php

/**
 * Book form.
 *
 * @package    form
 * @subpackage book
 * @version    SVN: $Id: BookForm.class.php 6884 2008-01-02 10:32:24Z dwhittle $
 */
class InquiryNowFront extends BaseBookingForm
{
    public function configure()
    {
        parent::setup();
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'full_name' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(),
            'phone' => new sfWidgetFormInputText(),
            'body' => new sfWidgetFormTextarea(),
//            'address' => new sfWidgetFormInputText(),
            'shipping_term' => new sfWidgetFormInputText(),
//            'subject' => new sfWidgetFormInputText(),
            'requirement' => new sfWidgetFormTextarea(),
            'lang' => new sfWidgetFormInputText(),
            'country' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'full_name' => new sfValidatorString(array('max_length' => 255), array(
                'required' => $i18n->__('You did not finish the blank, please check')
            )),
            'phone' => new sfValidatorString(array('max_length' => 255, 'required' => true), array(
                'required' => $i18n->__('You did not finish the blank, please check')
            )),
            'email' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'body' => new sfValidatorString(array('required' => false)),
            'lang' => new sfValidatorString(array('max_length' => 10)),
            'country' => new sfValidatorPass(),
//            'address' => new sfValidatorPass(),
            'shipping_term' => new sfValidatorPass(),
//            'subject' => new sfValidatorPass(),
            'requirement' => new sfValidatorPass(),
        ));
        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
        $this->widgetSchema->setNameFormat('booking[%s]');

    }

    protected function doBind(array $values)
    {
        $values['lang'] = sfContext::getInstance()->getUser()->getCulture();
        parent::doBind($values);
    }
}
