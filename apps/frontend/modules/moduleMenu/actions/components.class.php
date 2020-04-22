<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 11:08 AM
 * To change this template use File | Settings | File Templates.
 */
class moduleMenuComponents extends sfComponents
{
    public function executeMainMenu()
    {
        $category = VtpProductsCategoryTable::getCategoryByParentID(null, 10);
        $data = array();
        if($category && count($category)){
            foreach ($category as $cate){
                $catChild = VtpProductsCategoryTable::getCategoryByParentID($cate['id'], 10);
                $cate['childs'] = $catChild;
                $data[] = $cate;
            }
        }
        $this->data = $data;
        //lay danh dach dich vu
        $service = AdProductTable::getAllService(2, 10);
        $this->services = $service;
    }

    public function executeMainMenuHome()
    {
        $request=sfContext::getInstance()->getRequest();
        $this->slug_menu=$request->getParameter('slug_menu');
        $mainMenu=VtpMenuTable::getMenu(0);
        if (!count($mainMenu))
            return sfView::NONE;
        $this->mainMenu=$mainMenu;
    }
    public function executeFooterMenu()
    {
        $footerMenu=AdMenuTable::getMenu();
        if (!count($footerMenu))
            return sfView::NONE;
        $this->footerMenu=$footerMenu;
    }

    public function executeLinkRight(){
        $listLink = AdLinkTable::getLink(1);
        if($listLink){
            $this->links = $listLink;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeLinkFooter(){
        $listLink = AdLinkTable::getLink(2);
        if($listLink){
            $this->links = $listLink;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeContentFooter(){
        
    }

    public function executeHeader(){
        //lay ra danh sach album
        $this->listAlbum = AdAlbumTable::getAllAlbum()->fetchArray();
    }
    public function executeHeaderMobile(){
        //lay ra danh sach album
        $this->listAlbum = AdAlbumTable::getAllAlbum()->fetchArray();
    }

    public function executeBreadscrumbs($request)
    {
        $this->arrBread = $this->getVar('arrBread');
    }

}