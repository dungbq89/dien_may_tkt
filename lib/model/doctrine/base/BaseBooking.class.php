<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Booking', 'doctrine');

/**
 * BaseBooking
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $full_name
 * @property string $phone
 * @property string $email
 * @property clob $body
 * @property integer $category_id
 * @property integer $product_id
 * @property string $lang
 * @property integer $is_check
 * @property timestamp $from_time
 * @property timestamp $to_time
 * @property integer $number_person
 * @property integer $number_room
 * @property string $country
 * @property string $address
 * @property string $shipping_term
 * @property string $subject
 * @property string $requirement
 * 
 * @method string    getFullName()      Returns the current record's "full_name" value
 * @method string    getPhone()         Returns the current record's "phone" value
 * @method string    getEmail()         Returns the current record's "email" value
 * @method clob      getBody()          Returns the current record's "body" value
 * @method integer   getCategoryId()    Returns the current record's "category_id" value
 * @method integer   getProductId()     Returns the current record's "product_id" value
 * @method string    getLang()          Returns the current record's "lang" value
 * @method integer   getIsCheck()       Returns the current record's "is_check" value
 * @method timestamp getFromTime()      Returns the current record's "from_time" value
 * @method timestamp getToTime()        Returns the current record's "to_time" value
 * @method integer   getNumberPerson()  Returns the current record's "number_person" value
 * @method integer   getNumberRoom()    Returns the current record's "number_room" value
 * @method string    getCountry()       Returns the current record's "country" value
 * @method string    getAddress()       Returns the current record's "address" value
 * @method string    getShippingTerm()  Returns the current record's "shipping_term" value
 * @method string    getSubject()       Returns the current record's "subject" value
 * @method string    getRequirement()   Returns the current record's "requirement" value
 * @method Booking   setFullName()      Sets the current record's "full_name" value
 * @method Booking   setPhone()         Sets the current record's "phone" value
 * @method Booking   setEmail()         Sets the current record's "email" value
 * @method Booking   setBody()          Sets the current record's "body" value
 * @method Booking   setCategoryId()    Sets the current record's "category_id" value
 * @method Booking   setProductId()     Sets the current record's "product_id" value
 * @method Booking   setLang()          Sets the current record's "lang" value
 * @method Booking   setIsCheck()       Sets the current record's "is_check" value
 * @method Booking   setFromTime()      Sets the current record's "from_time" value
 * @method Booking   setToTime()        Sets the current record's "to_time" value
 * @method Booking   setNumberPerson()  Sets the current record's "number_person" value
 * @method Booking   setNumberRoom()    Sets the current record's "number_room" value
 * @method Booking   setCountry()       Sets the current record's "country" value
 * @method Booking   setAddress()       Sets the current record's "address" value
 * @method Booking   setShippingTerm()  Sets the current record's "shipping_term" value
 * @method Booking   setSubject()       Sets the current record's "subject" value
 * @method Booking   setRequirement()   Sets the current record's "requirement" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBooking extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('booking');
        $this->hasColumn('full_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tên KH',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'comment' => 'SĐT',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'comment' => 'email',
             'length' => 255,
             ));
        $this->hasColumn('body', 'clob', null, array(
             'type' => 'clob',
             'comment' => 'Nội dung bài viết trên web',
             ));
        $this->hasColumn('category_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('product_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('lang', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Đa ngôn ngữ',
             'length' => 10,
             ));
        $this->hasColumn('is_check', 'integer', 5, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'comment' => '0 chưa xử lý, 1 đang xử lý, 2 đã xử lý',
             'length' => 5,
             ));
        $this->hasColumn('from_time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'Thời gian đặt phòng',
             'length' => 25,
             ));
        $this->hasColumn('to_time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'Thời gian kết thúc đặt phòng',
             'length' => 25,
             ));
        $this->hasColumn('number_person', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('number_room', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('country', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('shipping_term', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('subject', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('requirement', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}