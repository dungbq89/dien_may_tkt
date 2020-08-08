<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdLink', 'doctrine');

/**
 * BaseAdLink
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $lang
 * @property string $link
 * @property integer $priority
 * @property integer $type
 * @property boolean $is_active
 * 
 * @method string  getName()      Returns the current record's "name" value
 * @method string  getLang()      Returns the current record's "lang" value
 * @method string  getLink()      Returns the current record's "link" value
 * @method integer getPriority()  Returns the current record's "priority" value
 * @method integer getType()      Returns the current record's "type" value
 * @method boolean getIsActive()  Returns the current record's "is_active" value
 * @method AdLink  setName()      Sets the current record's "name" value
 * @method AdLink  setLang()      Sets the current record's "lang" value
 * @method AdLink  setLink()      Sets the current record's "link" value
 * @method AdLink  setPriority()  Sets the current record's "priority" value
 * @method AdLink  setType()      Sets the current record's "type" value
 * @method AdLink  setIsActive()  Sets the current record's "is_active" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdLink extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_link');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tên link',
             'length' => 255,
             ));
        $this->hasColumn('lang', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tên link',
             'length' => 255,
             ));
        $this->hasColumn('link', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Đường dẫn',
             'length' => 255,
             ));
        $this->hasColumn('priority', 'integer', 5, array(
             'type' => 'integer',
             'length' => 5,
             ));
        $this->hasColumn('type', 'integer', 5, array(
             'type' => 'integer',
             'default' => 1,
             'comment' => '1: kiểu link cột bên phải, 2 là link footer',
             'length' => 5,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trạng thái duyệt bài viết',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $vtblameable0 = new Doctrine_Template_VtBlameable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($vtblameable0);
        $this->actAs($timestampable0);
    }
}