<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class tempComponents extends sfComponents
{

    public function executeMetaHeader($request) {

    }

    public function executeMobSideBar($request) {

    }
    public function executeHeader($request) {
        $mainMenu=VtpMenuTable::getMenu(0);
        $this->mainMenu = $mainMenu;
    }
    public function executeFooter($request) {

    }


}
