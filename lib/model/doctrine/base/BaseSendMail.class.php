<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SendMail', 'doctrine');

/**
 * BaseSendMail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $email
 * @property boolean $is_active
 * @property string $lang
 * 
 * @method string   getEmail()     Returns the current record's "email" value
 * @method boolean  getIsActive()  Returns the current record's "is_active" value
 * @method string   getLang()      Returns the current record's "lang" value
 * @method SendMail setEmail()     Sets the current record's "email" value
 * @method SendMail setIsActive()  Sets the current record's "is_active" value
 * @method SendMail setLang()      Sets the current record's "lang" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSendMail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('send_mail');
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'email',
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