<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdFeedBack', 'doctrine');

/**
 * BaseAdFeedBack
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $phone
 * @property string $message
 * @property boolean $is_active
 * @property string $lang
 * 
 * @method string     getName()      Returns the current record's "name" value
 * @method string     getEmail()     Returns the current record's "email" value
 * @method string     getTitle()     Returns the current record's "title" value
 * @method string     getPhone()     Returns the current record's "phone" value
 * @method string     getMessage()   Returns the current record's "message" value
 * @method boolean    getIsActive()  Returns the current record's "is_active" value
 * @method string     getLang()      Returns the current record's "lang" value
 * @method AdFeedBack setName()      Sets the current record's "name" value
 * @method AdFeedBack setEmail()     Sets the current record's "email" value
 * @method AdFeedBack setTitle()     Sets the current record's "title" value
 * @method AdFeedBack setPhone()     Sets the current record's "phone" value
 * @method AdFeedBack setMessage()   Sets the current record's "message" value
 * @method AdFeedBack setIsActive()  Sets the current record's "is_active" value
 * @method AdFeedBack setLang()      Sets the current record's "lang" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdFeedBack extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_feed_back');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tên',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'email',
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'tieu de',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'sdt',
             'length' => 255,
             ));
        $this->hasColumn('message', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'tin nhan',
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             'default' => false,
             'comment' => 'Trạng thái',
             ));
        $this->hasColumn('lang', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Đa ngôn ngữ',
             'length' => 10,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}