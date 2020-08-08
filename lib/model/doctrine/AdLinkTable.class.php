<?php

/**
 * AdLinkTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdLinkTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdLinkTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdLink');
    }

    public static function getLink($type, $limit = 10)
    {
        return AdLinkTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('is_active=1')
            ->orderBy('priority asc')
            ->limit($limit)
            ->fetchArray();
    }
    public static function getLinkV2($type, $limit = 10)
    {
        return AdLinkTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('is_active=1')
            ->orderBy('priority asc')
            ->limit($limit)
            ->execute();
    }
}