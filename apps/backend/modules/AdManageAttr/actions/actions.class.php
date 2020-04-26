<?php

require_once dirname(__FILE__).'/../lib/AdManageAttrGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/AdManageAttrGeneratorHelper.class.php';

/**
 * AdManageAttr actions.
 *
 * @package    symfony
 * @subpackage AdManageAttr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdManageAttrActions extends autoAdManageAttrActions
{

    protected function executeBatchDelete(sfWebRequest $request)
    {
        die('2');
        $ids = $request->getParameter('ids');

        $records = Doctrine_Query::create()
            ->from('AdManageAttr')
            ->whereIn('id', $ids)
            ->execute();

        foreach ($records as $record)
        {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

            $record->delete();
        }

        $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        $this->redirect('@ad_manage_attr');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $parant = $request->getParameter('parent');
        var_dump($parant);
        die('1');
        $request->checkCSRFProtection();

        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        if ($this->getRoute()->getObject()->delete())
        {
            $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
        }

        $this->redirect('@ad_manage_attr');
    }
}
