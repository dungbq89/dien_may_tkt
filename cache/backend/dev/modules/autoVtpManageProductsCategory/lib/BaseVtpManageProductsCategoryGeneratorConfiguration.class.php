<?php

/**
 * vtpManageProductsCategory module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage vtpManageProductsCategory
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVtpManageProductsCategoryGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  protected function compile()
  {
    $config = $this->getConfig();

    // inheritance rules:
    // new|edit < form < default
    // list < default
    // filter < default
    $this->configuration = array(
      'list'   => array(
        'fields'         => array(),
        'layout'         => $this->getListLayout(),
        'title'          => $this->getListTitle(),
        'actions'        => $this->getListActions(),
        'object_actions' => $this->getListObjectActions(),
        'params'         => $this->getListParams(),
      ),
      'filter' => array(
        'fields'  => array(),
      ),
      'form'   => array(
        'fields'  => array(),
      ),
      'new'    => array(
        'fields'  => array(),
        'title'   => $this->getNewTitle(),
        'actions' => $this->getNewActions() ? $this->getNewActions() : $this->getFormActions(),
      ),
      'edit'   => array(
        'fields'  => array(),
        'title'   => $this->getEditTitle(),
        'actions' => $this->getEditActions() ? $this->getEditActions() : $this->getFormActions(),
      ),
      'show'   => array(
        'fields'  => array(),
        'title'   => $this->getShowTitle(),
        'actions' => $this->getShowActions() ? $this->getShowActions() : $this->getFormActions(),
        'display' => $this->getShowDisplay(),
      ),
    );

    foreach (array_keys($config['default']) as $field)
    {
      $formConfig = array_merge($config['default'][$field], isset($config['form'][$field]) ? $config['form'][$field] : array());

      $this->configuration['list']['fields'][$field]   = new sfModelGeneratorConfigurationField($field, array_merge(array('label' => sfInflector::humanize(sfInflector::underscore($field))), $config['default'][$field], isset($config['list'][$field]) ? $config['list'][$field] : array()));
      $this->configuration['filter']['fields'][$field] = new sfModelGeneratorConfigurationField($field, array_merge($config['default'][$field], isset($config['filter'][$field]) ? $config['filter'][$field] : array()));
      $this->configuration['new']['fields'][$field]    = new sfModelGeneratorConfigurationField($field, array_merge($formConfig, isset($config['new'][$field]) ? $config['new'][$field] : array()));
      $this->configuration['edit']['fields'][$field]   = new sfModelGeneratorConfigurationField($field, array_merge($formConfig, isset($config['edit'][$field]) ? $config['edit'][$field] : array()));
      $this->configuration['show']['fields'][$field]   = new sfModelGeneratorConfigurationField($field, array_merge($formConfig, isset($config['show'][$field]) ? $config['show'][$field] : array()));
    }

    // "virtual" fields for list
    foreach ($this->getListDisplay() as $field)
    {
      list($field, $flag) = sfModelGeneratorConfigurationField::splitFieldWithFlag($field);

      $this->configuration['list']['fields'][$field] = new sfModelGeneratorConfigurationField($field, array_merge(
        array('type' => 'Text', 'label' => sfInflector::humanize(sfInflector::underscore($field))),
        isset($config['default'][$field]) ? $config['default'][$field] : array(),
        isset($config['list'][$field]) ? $config['list'][$field] : array(),
        array('flag' => $flag)
      ));
    }

    // form actions
    foreach (array('edit', 'new') as $context)
    {
      foreach ($this->configuration[$context]['actions'] as $action => $parameters)
      {
        $this->configuration[$context]['actions'][$action] = $this->fixActionParameters($action, $parameters);
      }
    }

    // list actions
    foreach ($this->configuration['list']['actions'] as $action => $parameters)
    {
      $this->configuration['list']['actions'][$action] = $this->fixActionParameters($action, $parameters);
    }

    // list batch actions
    $this->configuration['list']['batch_actions'] = array();
    foreach ($this->getListBatchActions() as $action => $parameters)
    {
      $parameters = $this->fixActionParameters($action, $parameters);

      $action = 'batch'.ucfirst(0 === strpos($action, '_') ? substr($action, 1) : $action);

      $this->configuration['list']['batch_actions'][$action] = $parameters;
    }

    // list object actions
    foreach ($this->configuration['list']['object_actions'] as $action => $parameters)
    {
      $this->configuration['list']['object_actions'][$action] = $this->fixActionParameters($action, $parameters);
    }

    // list field configuration
    $this->configuration['list']['display'] = array();
    foreach ($this->getListDisplay() as $name)
    {
      list($name, $flag) = sfModelGeneratorConfigurationField::splitFieldWithFlag($name);
      if (!isset($this->configuration['list']['fields'][$name]))
      {
        throw new InvalidArgumentException(sprintf('The field "%s" does not exist.', $name));
      }
      $field = $this->configuration['list']['fields'][$name];
      $field->setFlag($flag);
      $this->configuration['list']['display'][$name] = $field;
    }

    // parse the %%..%% variables, remove flags and add default fields where
    // necessary (fixes #7578)
    $this->parseVariables('list', 'params');
    $this->parseVariables('edit', 'title');
    $this->parseVariables('show', 'title');
    $this->parseVariables('list', 'title');
    $this->parseVariables('new', 'title');

    // action credentials
    $this->configuration['credentials'] = array(
      'list'   => array(),
      'new'    => array(),
      'create' => array(),
      'edit'   => array(),
      'show'   => array(),
      'update' => array(),
      'delete' => array(),
    );
    foreach ($this->getActionsDefault() as $action => $params)
    {
      if (0 === strpos($action, '_'))
      {
        $action = substr($action, 1);
      }

      $this->configuration['credentials'][$action] = isset($params['credentials']) ? $params['credentials'] : array();
      $this->configuration['credentials']['batch'.ucfirst($action)] = isset($params['credentials']) ? $params['credentials'] : array();
    }
    $this->configuration['credentials']['create'] = $this->configuration['credentials']['new'];
    $this->configuration['credentials']['update'] = $this->configuration['credentials']['edit'];


    $this->configuration['show'] = array( 'fields'         => array(),
                                          'title'          => $this->getShowTitle(),
                                          'actions'        => $this->getShowActions(),
                                          'display'        => $this->getShowDisplay(),
                                        ) ;

    foreach (array_keys($config['default']) as $field)
    {
      $formConfig = array_merge($config['default'][$field], $config['form'][$field]);
      $this->configuration['show']['fields'][$field]   = new sfModelGeneratorConfigurationField($field, array_merge(array('label' => sfInflector::humanize(sfInflector::underscore($field))), $config['default'][$field], $config['show'][$field]));
    }

    // virtual show fields
    foreach ($this->getShowDisplay() as $title => $fields)
    {
      foreach((array) $fields as $field)
      {
        list($field, $flag) = sfModelGeneratorConfigurationField::splitFieldWithFlag($field);

        $this->configuration['show']['fields'][$title][$field] = new sfModelGeneratorConfigurationField($field, array_merge(
            array('type' => 'Text', 'label' => sfInflector::humanize(sfInflector::underscore($field))),
            isset($config['default'][$field]) ? $config['default'][$field] : array(),
            isset($config['show'][$title][$field]) ? $config['show'][$title][$field] : array(),
            array('flag' => $flag)
        ));
      }
    }

    // show field configuration
    $this->configuration['show']['display'] = array();
    foreach ($this->getShowDisplay() as $title => $fields)
    {
      foreach((array) $fields as $name)
      {
        list($name, $flag) = sfModelGeneratorConfigurationField::splitFieldWithFlag($name);
        if (!isset($this->configuration['show']['fields'][$title][$name]))
        {
            throw new InvalidArgumentException(sprintf('The field "%s" does not exist.', $name));
        }
        $field = $this->configuration['show']['fields'][$title][$name];
        $field->setFlag($flag);
        $this->configuration['show']['display'][$title][$name] = $field;
      }
    }

    // show actions
    foreach (array('show') as $context)
    {
      foreach ($this->configuration[$context]['actions'] as $action => $parameters)
      {
        $this->configuration[$context]['actions'][$action] = $this->fixActionParameters($action, $parameters);
      }
    }

  }

  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_show' => NULL,  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%name%% - %%parent_id%% - %%is_active%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Danh sách chuyên mục sản phẩm';
  }

  public function getEditTitle()
  {
    return 'Sửa chuyên mục sản phẩm';
  }

  public function getNewTitle()
  {
    return 'Thêm mới chuyên mục sản phẩm';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'name',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'name',  1 => 'parent_id',  2 => 'image_path',  3 => 'link',  4 => 'priority',  5 => 'is_home',  6 => 'is_active',);
  }

  public function getEditDisplay()
  {
    return array(  0 => 'name',  1 => 'parent_id',  2 => 'image_path',  3 => 'link',  4 => 'priority',  5 => 'is_home',  6 => 'is_active',  7 => 'cat_attr',);
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'name',  1 => 'parent_id',  2 => 'is_active',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Tên danh mục',),
      'address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'image_path' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Ảnh đại diện',),
      'link' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Đường dẫn chi tiết',),
      'priority' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Thứ tự hiển thị',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Trạng thái',),
      'is_home' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Trang chủ',),
      'lang' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'portal_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'meta' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'keywords' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'parent_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Chuyên mục cha',),
      'level' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'lat' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'log' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'parameter_ids' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'list_image' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'msisdn' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'updated_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'cat_attr' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Chọn thuộc tính',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'address' => array(),
      'image_path' => array(),
      'link' => array(),
      'priority' => array(),
      'is_active' => array(),
      'is_home' => array(),
      'lang' => array(),
      'description' => array(),
      'slug' => array(),
      'portal_id' => array(),
      'meta' => array(),
      'keywords' => array(),
      'parent_id' => array(),
      'level' => array(),
      'lat' => array(),
      'log' => array(),
      'parameter_ids' => array(),
      'list_image' => array(),
      'email' => array(),
      'msisdn' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'address' => array(),
      'image_path' => array(),
      'link' => array(),
      'priority' => array(),
      'is_active' => array(),
      'is_home' => array(),
      'lang' => array(),
      'description' => array(),
      'slug' => array(),
      'portal_id' => array(),
      'meta' => array(),
      'keywords' => array(),
      'parent_id' => array(),
      'level' => array(),
      'lat' => array(),
      'log' => array(),
      'parameter_ids' => array(),
      'list_image' => array(),
      'email' => array(),
      'msisdn' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'address' => array(),
      'image_path' => array(),
      'link' => array(),
      'priority' => array(),
      'is_active' => array(),
      'is_home' => array(),
      'lang' => array(),
      'description' => array(),
      'slug' => array(),
      'portal_id' => array(),
      'meta' => array(),
      'keywords' => array(),
      'parent_id' => array(),
      'level' => array(),
      'lat' => array(),
      'log' => array(),
      'parameter_ids' => array(),
      'list_image' => array(),
      'email' => array(),
      'msisdn' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'address' => array(),
      'image_path' => array(),
      'link' => array(),
      'priority' => array(),
      'is_active' => array(),
      'is_home' => array(),
      'lang' => array(),
      'description' => array(),
      'slug' => array(),
      'portal_id' => array(),
      'meta' => array(),
      'keywords' => array(),
      'parent_id' => array(),
      'level' => array(),
      'lat' => array(),
      'log' => array(),
      'parameter_ids' => array(),
      'list_image' => array(),
      'email' => array(),
      'msisdn' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'address' => array(),
      'image_path' => array(),
      'link' => array(),
      'priority' => array(),
      'is_active' => array(),
      'is_home' => array(),
      'lang' => array(),
      'description' => array(),
      'slug' => array(),
      'portal_id' => array(),
      'meta' => array(),
      'keywords' => array(),
      'parent_id' => array(),
      'level' => array(),
      'lat' => array(),
      'log' => array(),
      'parameter_ids' => array(),
      'list_image' => array(),
      'email' => array(),
      'msisdn' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsShow()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'address' => array(),
      'image_path' => array(),
      'link' => array(),
      'priority' => array(),
      'is_active' => array(),
      'is_home' => array(),
      'lang' => array(),
      'description' => array(),
      'slug' => array(),
      'portal_id' => array(),
      'meta' => array(),
      'keywords' => array(),
      'parent_id' => array(),
      'level' => array(),
      'lat' => array(),
      'log' => array(),
      'parameter_ids' => array(),
      'list_image' => array(),
      'email' => array(),
      'msisdn' => array(),
      'created_by' => array(),
      'updated_by' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


public function getGlobalSidebarStatus() {
    return false;
    }
public function getListSidebarStatus() {
    return $this->getGlobalSidebarStatus();
    }
public function getShowSidebarStatus() {
    return $this->getGlobalSidebarStatus();
    }
public function getEditSidebarStatus() {
    return $this->getGlobalSidebarStatus();
    }
public function getNewSidebarStatus() {
    return $this->getGlobalSidebarStatus();
    }
  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'VtpProductsCategoryFormAdmin';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'VtpProductsCategoryFormFilter';
  }


  protected function getConfig()
  {
    $configuration = parent::getConfig();
    $configuration['show'] = $this->getFieldsShow();
    return $configuration;
  }

  public function getShowActions()
  {
    return array(  '_list' => NULL,  '_edit' => NULL,  '_delete' => NULL,);
      }


  public function getShowTitle()
  {
    return 'Show VtpManageProductsCategory';
      }

  public function getShowDisplay()
  {
            return array('NONE' => array(  0 => 'id',  1 => 'name',  2 => 'address',  3 => 'image_path',  4 => 'link',  5 => 'priority',  6 => 'is_active',  7 => 'is_home',  8 => 'lang',  9 => 'description',  10 => 'slug',  11 => 'portal_id',  12 => 'meta',  13 => 'keywords',  14 => 'parent_id',  15 => 'level',  16 => 'lat',  17 => 'log',  18 => 'parameter_ids',  19 => 'list_image',  20 => 'email',  21 => 'msisdn',  22 => 'created_by',  23 => 'updated_by',  24 => 'created_at',  25 => 'updated_at',));
          }



  public function getPager($model)
  {
    $class = $this->getPagerClass();

    return new $class($model, $this->getPagerMaxPerPage());
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return sfContext::getInstance()->getUser()->getAttribute('vtpManageProductsCategory.max_per_page', 10, 'admin_module');
  }
  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }

  public function getContextConfiguration($context, $fields = null)
    {
        if (!isset($this->configuration[$context]))
        {
            throw new InvalidArgumentException(sprintf('The context "%s" does not exist.', $context));
        }

        if (null === $fields)
        {
            return $this->configuration[$context];
        }

        $f = array();
        $i18n_fields = array();
        foreach ($fields as $field)
        {
            if (in_array($field, $i18n_fields) && !array_key_exists($field, $this->configuration[$context]['fields']))
            {
                $f[$field] = new sfModelGeneratorConfigurationField($field, array('type' => 'Text', 'label' => $field));
            }
            else
            {
                $f[$field] = $this->configuration[$context]['fields'][$field];
            }
        }

        return $f;
    }

}
