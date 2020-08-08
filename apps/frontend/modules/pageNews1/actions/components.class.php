<?php

/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
class pageNewsComponents extends sfComponents
{
    public function executeHotNew(sfWebRequest $request)
    {
        $this->hotnew = false;
        $id = $this->getVar('id');
        $listArticleRelated = AdArticleTable::getListArticleRelated($id, 5);
        if($listArticleRelated && count($listArticleRelated)){
            $this->hotnew = $listArticleRelated;
        }else{
            $hotnew = AdArticleTable::getHotArticle();
            if ($hotnew) {
                $this->hotnew = $hotnew;
            }else{
                return sfView::NONE;
            }
        }

    }
}
