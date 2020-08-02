<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdVideo', 'doctrine');

/**
 * BaseAdVideo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property timestamp $event_date
 * @property string $file_path
 * @property string $image_path
 * @property string $extension
 * @property integer $priority
 * @property boolean $is_active
 * @property boolean $is_default
 * @property string $lang
 * @property string $slug
 * @property string $video_path
 * 
 * @method string    getName()        Returns the current record's "name" value
 * @method string    getDescription() Returns the current record's "description" value
 * @method timestamp getEventDate()   Returns the current record's "event_date" value
 * @method string    getFilePath()    Returns the current record's "file_path" value
 * @method string    getImagePath()   Returns the current record's "image_path" value
 * @method string    getExtension()   Returns the current record's "extension" value
 * @method integer   getPriority()    Returns the current record's "priority" value
 * @method boolean   getIsActive()    Returns the current record's "is_active" value
 * @method boolean   getIsDefault()   Returns the current record's "is_default" value
 * @method string    getLang()        Returns the current record's "lang" value
 * @method string    getSlug()        Returns the current record's "slug" value
 * @method string    getVideoPath()   Returns the current record's "video_path" value
 * @method AdVideo   setName()        Sets the current record's "name" value
 * @method AdVideo   setDescription() Sets the current record's "description" value
 * @method AdVideo   setEventDate()   Sets the current record's "event_date" value
 * @method AdVideo   setFilePath()    Sets the current record's "file_path" value
 * @method AdVideo   setImagePath()   Sets the current record's "image_path" value
 * @method AdVideo   setExtension()   Sets the current record's "extension" value
 * @method AdVideo   setPriority()    Sets the current record's "priority" value
 * @method AdVideo   setIsActive()    Sets the current record's "is_active" value
 * @method AdVideo   setIsDefault()   Sets the current record's "is_default" value
 * @method AdVideo   setLang()        Sets the current record's "lang" value
 * @method AdVideo   setSlug()        Sets the current record's "slug" value
 * @method AdVideo   setVideoPath()   Sets the current record's "video_path" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdVideo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_video');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tên video',
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Giới thiệu video',
             'length' => 1000,
             ));
        $this->hasColumn('event_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => true,
             'comment' => 'Ngày diễn ra sự kiện',
             'length' => 25,
             ));
        $this->hasColumn('file_path', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Đường dẫn file',
             'length' => 255,
             ));
        $this->hasColumn('image_path', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Ảnh đại diện',
             'length' => 255,
             ));
        $this->hasColumn('extension', 'string', 200, array(
             'type' => 'string',
             'comment' => 'phần mở rộng của file',
             'length' => 200,
             ));
        $this->hasColumn('priority', 'integer', 5, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => 'Độ ưu tiên hiển thị',
             'length' => 5,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trạng thái hiển thị (0: Chưa kích hoạt, 1: đã kích hoạt)',
             ));
        $this->hasColumn('is_default', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trạng thái mặc định để hiển thị, 1: hiển thị, 0: không hiển thị. 1 là duy nhất',
             ));
        $this->hasColumn('lang', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Đa ngôn ngữ',
             'length' => 10,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'comment' => 'chuyển đổi url',
             'length' => 255,
             ));
        $this->hasColumn('video_path', 'string', 255, array(
             'type' => 'string',
             'comment' => 'File ảnh đại diện video',
             'length' => 255,
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