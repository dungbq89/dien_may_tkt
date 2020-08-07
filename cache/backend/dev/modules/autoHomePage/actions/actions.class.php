<?php

require_once(dirname(__FILE__).'/../lib/BaseHomePageGeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../lib/BaseHomePageGeneratorHelper.class.php');

/**
 * homePage actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage homePage
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 31002 2010-09-27 12:04:07Z Kris.Wallsmith $
 */
abstract class autoHomePageActions extends sfActions
{
  /**
   * Ham xu ly ajax cho cac truong dang boolean
   * @author NamDT5
   * @created on 04/01/2013
   * @param sfWebRequest $request
   * @return string
   */
  public function executeToggleBoolean(sfWebRequest $request)
  {
    try {
      $request->checkCSRFProtection();
    } catch (Exception $e) {
      return $this->renderText('csrf');
    }
    $table = Doctrine_Core::getTable('sfGuardUser');

    if (
      $table->hasField($field = $request->getParameter('field'))
      && ($record = $table->find($request->getParameter('pk')))
    ) {
      $record->set($field, !$record->get($field));
      $record->save();

      return $this->renderText($record->$field ? '1' : '0');
    } else {
      return $this->renderText('404');
    }
  }

  public function preExecute()
  {
    $this->configuration = new homePageGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new homePageGeneratorHelper();

    parent::preExecute();
  }

  public function executeAjax(sfWebRequest $request)
  {
     $class_name = sfInflector::camelize($request->getParameter('model'));
     $id = $request->getParameter('row_id');

     if (class_exists($class_name))
     {
         $method = sfInflector::camelize($request->getParameter('field_name'));
         $method_set = 'set' . $method;
         $method_get = 'get' . $method;

         $record = Doctrine::getTable("{$class_name}")->findOneBy('id', $id);

         if ($record)
         {
             $record->$method_set($request->getParameter('value'));
             $record->save();
         }
     }
     
     return $this->renderText($record->$method_get());
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }
    else
    {
      $this->setPage(1);
    }

  // max per page
    if ($request->getParameter('max_per_page'))
    {
      $this->setMaxPerPage($request->getParameter('max_per_page'));
    }

    $this->sidebar_status = $this->configuration->getListSidebarStatus();
    $this->pager = $this->getPager();

    //Start - thongnq1 - 03/05/2013 - fix loi xoa du lieu tren trang danh sach
    if ($request->getParameter('current_page'))
    {
      $current_page = $request->getParameter('current_page');
      $this->setPage($current_page);
      $this->pager = $this->getPager();
    }
    //end thongnq1

    $this->sort = $this->getSort();
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@homepage');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
        //Chuyennv2 trim du lieu
      $filterValues = $request->getParameter($this->filters->getName());
      foreach ($filterValues as $key => $value)
      {
          if (isset($filterValues[$key]['text']))
          {
          $filterValues[$key]['text'] = trim($filterValues[$key]['text']);
          }
      }

  $this->filters->bind($filterValues);
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@homepage');
    }
    $this->sidebar_status = $this->configuration->getListSidebarStatus();
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getNewSidebarStatus();
    $this->form = $this->configuration->getForm();
    $this->sf_guard_user = $this->form->getObject();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getNewSidebarStatus();
    $this->form = $this->configuration->getForm();
    $this->sf_guard_user = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getEditSidebarStatus();
    $this->sf_guard_user = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->sf_guard_user);
    $this->fields = $this->sf_guard_user->getTable()->getColumnNames();
  }


    public function executeRevert(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $to_version = $request->getParameter('version');
        
        try
        {
            $object->revert($to_version);
            $object->save();
            $this->getUser()->setFlash('notice', 'Restored version #' . $to_version);
        }
        catch (Exception $exc)
        {
            $this->getUser()->setFlash('error', 'Could not revert item to desired version.', false);
        }
        
        $redirect = $request->getReferer() ? $request->getReferer() : array('sf_route' => 'homepage_show', 'sf_subject' => $object);
        
        $this->redirect($redirect);        

    }
  public function executeUpdate(sfWebRequest $request)
  {
    $this->sidebar_status = $this->configuration->getEditSidebarStatus();
    $this->sf_guard_user = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->sf_guard_user);
    $this->fields = $this->sf_guard_user->getTable()->getColumnNames();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@homepage');
  }

  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@homepage');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@homepage');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error','A problem occurs when deleting the selected items some items do not exist anymore.');
    }

    $this->redirect('@homepage');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('sfGuardUser')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@homepage');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $values=$request->getParameter($form->getName());
    $values['lang']= sfContext::getInstance()->getUser()->getCulture();
    $form->bind($values, $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $sf_guard_user = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $sf_guard_user)));

      if ($request->hasParameter('_save_and_exit'))
      {
        $this->getUser()->setFlash('success', $notice);
        $this->redirect('@homepage');
      } elseif ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('success', $notice.' You can add another one below.');

        $this->redirect('@homepage_new');
      }
      else
      {
        $this->getUser()->setFlash('success', $notice);

        $this->redirect(array('sf_route' => 'homepage_edit', 'sf_subject' => $sf_guard_user));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('homePage.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('homePage.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $query = $this->buildQuery();
    $pages = ceil($query->count() / $this->getMaxPerPage());
    $pager = $this->configuration->getPager('sfGuardUser');
    $pager->setQuery($query);
    $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
    $pager->init();

    return $pager;
  }

  protected function setMaxPerPage($max_per_page)
  {
    $this->getUser()->setAttribute('homePage.max_per_page', (integer) $max_per_page, 'admin_module');
  }
  
  protected function getMaxPerPage()
  {
    return $this->getUser()->getAttribute('homePage.max_per_page', sfConfig::get('app_default_max_per_page', 20), 'admin_module');
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('homePage.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('homePage.page', 1, 'admin_module');
  }

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }

  protected function addSortQuery($query)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    if (!in_array(strtolower($sort[1]), array('asc', 'desc')))
    {
      $sort[1] = 'asc';
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('homePage.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('homePage.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('homePage.sort', $sort, 'admin_module');
  }

  protected function isValidSortColumn($column)
  {
    return Doctrine_Core::getTable('sfGuardUser')->hasColumn($column);
  }

    public function executePromote(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $this->forward404Unless($object);
        $object->promote();

        $this->getUser()->setFlash('notice', 'Object promoted.');

        $this->redirect($this->helper->getUrlForAction('list'));
    }

    public function executeDemote(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $this->forward404Unless($object);
        $object->demote();

        $this->getUser()->setFlash('notice', 'Object demoted.');
        $this->redirect($this->helper->getUrlForAction('list'));
    }

    public function executeMove(sfWebRequest $request)
    {
        $object = $this->getRoute()->getObject();
        $this->forward404Unless($object);

        $position = (integer) $this->getRequestParameter('position', 0);
        if ($position > 0)
        {
            $object->moveToPosition($position);
            $this->getUser()->setFlash('notice', 'Object has been moved successfully to new position.');
        }
        else
        {
            $this->getUser()->setFlash('error', 'Invalid position.');
        }
        $this->redirect($this->helper->getUrlForAction('list'));
    }}
