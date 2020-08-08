<?php

require_once dirname(__FILE__).'/../lib/bookingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bookingGeneratorHelper.class.php';

/**
 * booking actions.
 *
 * @package    symfony
 * @subpackage booking
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookingActions extends autoBookingActions
{

    protected function getPager()
    {
        $query = $this->buildQuery();
        $pages = ceil($query->count() / $this->getMaxPerPage());
        $pager = $this->configuration->getPager('Booking');
        $query=$query->orderBy('id desc');
        $pager->setQuery($query);
        $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
        $pager->init();

        return $pager;
    }
}
