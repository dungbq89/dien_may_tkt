<?php

/**
 * Book filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: BookFormFilter.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BookingFormFilterAdmin extends BaseBookingFormFilter
{
    public function configure()
    {
        parent::setup();
        $aBookType = [
            '' => 'Chọn loại đơn hàng',
            '1' => 'Đặt hàng',
            '2' => 'Yêu cầu tư vấn'
        ];
        $arrIsCheck = [
            '' => 'Chọn Trạng thái',
            '1' => 'Đang xử lý',
            '2' => 'Đã xử lý'
        ];
        $this->setWidgets(array(
            'full_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'phone' => new sfWidgetFormFilterInput(),
            'email' => new sfWidgetFormFilterInput(),
            'is_check' => new sfWidgetFormChoice(array(
                'choices' => $arrIsCheck,
                'multiple' => false,
                'expanded' => false)),
            'book_type' => new sfWidgetFormChoice(array(
                'choices' => $aBookType,
                'multiple' => false,
                'expanded' => false)),
//            'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'full_name' => new sfValidatorPass(array('required' => false)),
            'phone' => new sfValidatorPass(array('required' => false)),
            'email' => new sfValidatorPass(array('required' => false)),
            'is_check' => new sfValidatorChoice(array(
                'required' => false,
                'choices' => array_keys($arrIsCheck))),
            'book_type' => new sfValidatorChoice(array(
                'required' => false,
                'choices' => array_keys($aBookType))),
//            'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('booking_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    }


    public function addIsCheckColumnQuery($query, $field, $values)
    {
        if (($values['is_check'])) {
            return $query->andWhere("is_check = ?", $values['is_check']);
        }
    }

    public function addBookTypeColumnQuery($query, $field, $values)
    {
        if (($values['book_type'])) {
            return $query->andWhere("book_type = ?", $values['book_type']);
        }
    }
//
//    public function addFullNameColumnQuery($query, $field, $values)
//    {
//        if (($values['full_name'])) {
//            return $query->andWhere("full_name LIKE ?", "%" . $values['full_name'] . "%");
//        }
//    }
//
//    public function addPhoneColumnQuery($query, $field, $values)
//    {
//        var_dump($values['phone']);
//        die('1');
//        if (($values['phone'])) {
//
//            return $query->andWhere("phone LIKE ?", "%" . $values['phone'] . "%");
//        }
//    }
//
//    public function addEmailColumnQuery($query, $field, $values)
//    {
//        if (($values['email'])) {
//            return $query->andWhere("email LIKE ?", "%" . $values['email'] . "%");
//        }
//    }
}
