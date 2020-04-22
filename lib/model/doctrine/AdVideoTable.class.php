<?php

/**
 * AdVideoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdVideoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdVideoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdVideo');
    }
    public static function checkSlug($slug,$id)
    {
        $query=  AdVideoTable::getInstance()->createQuery()
            ->select('slug')
            ->where('slug=?',$slug)
            ->andWhere('id<>?',$id);
        return $query;
    }

    public static function updateDefault($id)
    {
        $query=AdVideoTable::getInstance()->createQuery()
            ->update()
            ->set('is_default', '?', VtCommonEnum::NUMBER_ZERO)
            ->where('is_default=?',VtCommonEnum::NUMBER_ONE);
         $query->execute();

        $query=AdVideoTable::getInstance()->createQuery()
            ->update()
            ->set('is_default', '?', VtCommonEnum::NUMBER_ONE)
            ->where('id=?',$id);
        return $query->execute();
    }

    public static function getListVideoHome($limit)
    {
        $query=  AdVideoTable::getInstance()->createQuery()
            ->where('is_active=?',VtCommonEnum::NUMBER_ONE)
            ->orderBy('is_default desc')
            ->limit($limit);
        return $query;
    }

    public static function getVideoById($id)
    {
        $query=  AdVideoTable::getInstance()->createQuery()
            ->where('is_active=?',VtCommonEnum::NUMBER_ONE)
            ->andWhere('id=?',$id);
        return $query;
    }

    public static function getVideoDefaultBySlug($slug) {
        $query = AdVideoTable::getInstance()->createQuery()
            ->select('name, description, event_date, file_path, image_path, slug')
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE);
        if ($slug != '') {
            $query->andWhere('slug=?', $slug);
        } else {
            $query->andWhere('is_default=?', VtCommonEnum::NUMBER_ONE);
        }

        return $query->fetchOne();
    }

    public static function returnSqlVideoDefaultBySlug($slug, $limit) {
        $query = AdVideoTable::getInstance()->createQuery()
            ->select('name, description, event_date, file_path, slug, image_path')
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('slug<>?', $slug)
            ->limit($limit);
        return $query;
    }

    public static function getVideoActive($videoId) {
        $query = AdVideoTable::getInstance()->createQuery()
            ->select('name, description, event_date, file_path, slug, image_path')
            ->where('id<>?', $videoId)
            ->andWhere('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->orderBy('priority asc');
        return $query->execute();
    }

    public function returnSqlVideoDefaultBySlugNew($slug, $limit, $page)
    {
        $query = $this->createQuery()
            ->select('name, description, event_date, file_path, slug, image_path')
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('slug<>?', $slug)
            ->orderBy('event_date desc');

        $pager = new sfDoctrinePager('AdVideo', $limit);
        $pager->setQuery($query);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }
}