<?php

/**
 * AdAdvertiseTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdAdvertiseTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdAdvertiseTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdAdvertise');
    }

    public static function getAdvertiseById($id)
    {
        return AdAdvertiseTable::getInstance()->createQuery()
            ->select('id,name')
            ->where('id=?', $id)
            ->fetchOne();
    }

    public static function getListAdvertist()
    {
        return AdAdvertiseTable::getInstance()->createQuery('a')
            ->select('a.name')
            ->where('a.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->orderBy('a.name asc')
            ->execute();
    }

    public static function getActiveAdvertise()
    {
        return AdAdvertiseTable::getInstance()->createQuery('a')
            ->where('a.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    /**
     * Ngoctv hàm lấy ra banner
     * @static
     * @param $page
     * @param $template
     * @return array
     */
    public static function getAdvertise($page, $template, $portalId)
    {
        return self::getActiveAdvertise()
            ->select('i.file_path, a.view_type, a.height, a.width, a.name, i.link')
            ->innerJoin('a.AdvertiseImage i')
            ->innerJoin('a.AdvertiseLocation l')
            ->andWhere('l.page=?', $page)
            ->andWhere('l.template=?', $template)
            ->andWhere('i.is_active=1')
            ->fetchArray();
    }

    /**
     * huync2
     * @param $page
     * @param $template
     * @param $portalId
     * @return mixed
     */
    public static function getAdvertiseV2($page, $template = false, $lang = 'vi')
    {
        $query = self::getActiveAdvertise()
            ->select('i.file_path, a.view_type, a.height, a.width, a.name, i.link')
            ->innerJoin('a.AdvertiseImage i')
            ->innerJoin('a.AdvertiseLocation l')
            ->andWhere('l.page=?', $page);
        if ($template)
            $query->andWhere('l.template=?', $template);
        $query->andWhere('i.is_active=1');
//            ->andWhere('a.lang=?', sfContext::getInstance()->getUser()->getCulture());
        $result = $query->fetchArray();
        if (!empty($result)) {
            return $result[0];
        }
        return false;
    }

}