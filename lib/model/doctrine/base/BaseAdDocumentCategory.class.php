<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdDocumentCategory', 'doctrine');

/**
 * BaseAdDocumentCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $image_path
 * @property string $description
 * @property integer $priority
 * @property boolean $is_home
 * @property boolean $is_active
 * @property Doctrine_Collection $DocumentCategory
 * 
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getImagePath()        Returns the current record's "image_path" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method integer             getPriority()         Returns the current record's "priority" value
 * @method boolean             getIsHome()           Returns the current record's "is_home" value
 * @method boolean             getIsActive()         Returns the current record's "is_active" value
 * @method Doctrine_Collection getDocumentCategory() Returns the current record's "DocumentCategory" collection
 * @method AdDocumentCategory  setName()             Sets the current record's "name" value
 * @method AdDocumentCategory  setImagePath()        Sets the current record's "image_path" value
 * @method AdDocumentCategory  setDescription()      Sets the current record's "description" value
 * @method AdDocumentCategory  setPriority()         Sets the current record's "priority" value
 * @method AdDocumentCategory  setIsHome()           Sets the current record's "is_home" value
 * @method AdDocumentCategory  setIsActive()         Sets the current record's "is_active" value
 * @method AdDocumentCategory  setDocumentCategory() Sets the current record's "DocumentCategory" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdDocumentCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_document_category');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Ho ten nguoi gop y',
             'length' => 255,
             ));
        $this->hasColumn('image_path', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 500, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 500,
             ));
        $this->hasColumn('priority', 'integer', 5, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 5,
             ));
        $this->hasColumn('is_home', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trang chủ (0: không hiển thị, 1: hiển thị)',
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trạng thái hiển thị (0: Chưa kích hoạt, 1: đã kích hoạt)',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AdDocument as DocumentCategory', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $vtblameable0 = new Doctrine_Template_VtBlameable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($vtblameable0);
        $this->actAs($timestampable0);
    }
}