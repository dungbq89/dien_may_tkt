<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/14/15
 * Time: 2:01 PM
 */
class pageDocumentActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $form=new documentForm();
        $user = sfContext::getInstance()->getUser();
        if ($request->hasParameter('page') && $user->getAttribute('searchDoc', false)) {
            $values = $request->getParameter($form->getName());
            $values['category']=$user->getAttribute('category');
            $values['keyword']=$user->getAttribute('keyword');
            $form->bind($values);
            $limit = 20;
            $user->setAttribute('searchDoc', true);
            $user->setAttribute('category', $values['category']);
            $user->setAttribute('keyword', $values['keyword']);

            $this->page = $request->getParameter('page', 1);
            $query = AdDocumentTable::getListDocument($values['category'],$values['keyword'],$limit);
            $pager = new sfDoctrinePager('AdDocument', $limit);
            $pager->setQuery($query);
            $pager->setPage($this->page);
            $pager->init();
            $this->pager = $pager;
            $this->listDocument = $this->pager->getResults();
        }

        if($request->isMethod('POST')){
            $values = $request->getParameter($form->getName());
            $form->bind($values);
            $limit = 20;
            $user->setAttribute('searchDoc', true);
            $user->setAttribute('category', $values['category']);
            $user->setAttribute('keyword', $values['keyword']);

            $this->page = $request->getParameter('page', 1);
            $query = AdDocumentTable::getListDocument($values['category'],$values['keyword'],$limit);
            $pager = new sfDoctrinePager('AdDocument', $limit);
            $pager->setQuery($query);
            $pager->setPage($this->page);
            $pager->init();
            $this->pager = $pager;
            $this->listDocument = $this->pager->getResults();
        }
        $this->form=$form;
    }

    public function executeList(sfWebRequest $request)
    {
        $id = $request->getParameter('id');
        if($id){
            $category = AdDocumentCategoryTable::getCategoryDocumentById($id);
            if($category){
                $this->catName = $category->getName();
                $this->url_paging = 'category_document';
                $this->page = $this->getRequestParameter('page', 1);
                $pager = new sfDoctrinePager('AdDocument', 10);
                $pager->setQuery(AdDocumentTable::getDocumentByCatId($category->getId()));
                $pager->setPage($this->page);
                $pager->init();
                $this->pager = $pager;
                $this->listDocument = $pager->getResults();
            }
            else{
                return $this->redirect404();
            }

        }
        else{
            return $this->redirect404();
        }

    }

    public function executeDetail(sfWebRequest $request){
        $id = $request->getParameter('id');
        if($id){
            $document = AdDocumentTable::getDocumentById($id)->fetchOne();
            if($document){
                $this->document = $document;
            }else{
                return $this->redirect404();
            }
        }
        else{
            return $this->redirect404();
        }
    }
}