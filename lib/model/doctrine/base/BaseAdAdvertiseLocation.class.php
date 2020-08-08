<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdAdvertiseLocation', 'doctrine');

/**
 * BaseAdAdvertiseLocation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $page
 * @property string $template
 * @property integer $advertise_id
 * @property integer $priority
 * @property Doctrine_Collection $AdAdvertiseLocation
 * @property Doctrine_Collection $AdAdvertiseLocationImage
 * 
 * @method string              getName()                     Returns the current record's "name" value
 * @method string              getPage()                     Returns the current record's "page" value
 * @method string              getTemplate()                 Returns the current record's "template" value
 * @method integer             getAdvertiseId()              Returns the current record's "advertise_id" value
 * @method integer             getPriority()                 Returns the current record's "priority" value
 * @method Doctrine_Collection getAdAdvertiseLocation()      Returns the current record's "AdAdvertiseLocation" collection
 * @method Doctrine_Collection getAdAdvertiseLocationImage() Returns the current record's "AdAdvertiseLocationImage" collection
 * @method AdAdvertiseLocation setName()                     Sets the current record's "name" value
 * @method AdAdvertiseLocation setPage()                     Sets the current record's "page" value
 * @method AdAdvertiseLocation setTemplate()                 Sets the current record's "template" value
 * @method AdAdvertiseLocation setAdvertiseId()              Sets the current record's "advertise_id" value
 * @method AdAdvertiseLocation setPriority()                 Sets the current record's "priority" value
 * @method AdAdvertiseLocation setAdAdvertiseLocation()      Sets the current record's "AdAdvertiseLocation" collection
 * @method AdAdvertiseLocation setAdAdvertiseLocationImage() Sets the current record's "AdAdvertiseLocationImage" collection
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdAdvertiseLocation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_advertise_location');
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Ten vi tri quang cao',
             'length' => 200,
             ));
        $this->hasColumn('page', 'string', 200, array(
             'type' => 'string',
             'comment' => 'Trang hiển thị',
             'length' => 200,
             ));
        $this->hasColumn('template', 'string', 200, array(
             'type' => 'string',
             'notnull' => false,
             'comment' => 'Duong dan toi file template quang cao',
             'length' => 200,
             ));
        $this->hasColumn('advertise_id', 'integer', null, array(
             'type' => 'integer',
             'comment' => 'banner quảng cáo',
             ));
        $this->hasColumn('priority', 'integer', 5, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => 'Thứ tự hiển thị',
             'length' => 5,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AdAdvertise as AdAdvertiseLocation', array(
             'local' => 'advertise_id',
             'foreign' => 'id'));

        $this->hasMany('AdAdvertiseImage as AdAdvertiseLocationImage', array(
             'local' => 'advertise_id',
             'foreign' => 'advertise_id'));
    }
}