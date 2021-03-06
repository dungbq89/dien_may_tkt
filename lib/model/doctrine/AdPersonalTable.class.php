<?php

/**
 * AdPersonalTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdPersonalTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdPersonalTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdPersonal');
    }

    public static function getListPersonal($limit = null, $offset = null){
        return AdPersonalTable::getInstance()->createQuery('a')
            ->orderBy('a.full_name asc')
            ->fetchArray();
    }

    public static function insertMultiPersonal($Personals){
        $list = new Doctrine_Collection('AdPersonal');
        foreach($Personals as $per){
            $item = new AdPersonal();
            $item->setFullName($per['full_name']);
            $item->setBirthday($per['birthday']);
            $item->setSex($per['sex']);
            $item->setPhoneNumber($per['phone_number']);
            $item->setEmail($per['email']);
            $item->setAddress($per['address']);
            $item->setIntroduction($per['introduction']);
            $list->add($item);
        }
        $list->save();
    }

    //frontend
    public static function getListPerson($full_name, $phone_number,$email,$limit)
    {
        $query = AdPersonalTable::getInstance()->createQuery()
            ->select()
            ->orderBy('full_name asc')
            ->limit($limit);

            if($full_name!=""){
                $query->andWhere('LOWER(full_name) like LOWER(?) COLLATE utf8_bin', '%' . trim($full_name) . '%');
            }
            if($full_name!=""){
                $query->andWhere('phone_number=?',$phone_number);
            }
            if($full_name!=""){
                $query->andWhere('email=?',$email);
            }
        return $query;
    }

}