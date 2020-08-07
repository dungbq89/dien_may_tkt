<?php
// auto-generated by sfViewConfigHandler
// date: 2020/08/01 02:10:05
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'indexSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'newSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'editSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'indexSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Danh sách danh mục sản phẩm', false, false);

  $response->addStylesheet('main_admin.css', '', array ());
  $response->addStylesheet('ui.all.css', '', array ());
  $response->addStylesheet('ui.core.css', '', array ());
  $response->addStylesheet('ui.datepicker.css', '', array ());
  $response->addStylesheet('validationEngine.jquery.css', '', array ());
  $response->addJavascript('ui.core.min.js', '', array ());
  $response->addJavascript('ui.datepicker.min.js', '', array ());
  $response->addJavascript('global.js', '', array ());
  $response->addJavascript('jquery.validationEngine-vn.js', '', array ());
  $response->addJavascript('jquery.validationEngine.js', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('ckfinder/ckfinder.js', '', array ());
  $response->addJavascript('vtBackend.js', '', array ());
}
else if ($templateName.$this->viewName == 'newSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Thêm mới danh mục sản phẩm', false, false);

  $response->addStylesheet('main_admin.css', '', array ());
  $response->addStylesheet('ui.all.css', '', array ());
  $response->addStylesheet('ui.core.css', '', array ());
  $response->addStylesheet('ui.datepicker.css', '', array ());
  $response->addStylesheet('validationEngine.jquery.css', '', array ());
  $response->addJavascript('ui.core.min.js', '', array ());
  $response->addJavascript('ui.datepicker.min.js', '', array ());
  $response->addJavascript('global.js', '', array ());
  $response->addJavascript('jquery.validationEngine-vn.js', '', array ());
  $response->addJavascript('jquery.validationEngine.js', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('ckfinder/ckfinder.js', '', array ());
  $response->addJavascript('vtBackend.js', '', array ());
}
else if ($templateName.$this->viewName == 'editSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Chỉnh sửa danh mục sản phẩm', false, false);

  $response->addStylesheet('main_admin.css', '', array ());
  $response->addStylesheet('ui.all.css', '', array ());
  $response->addStylesheet('ui.core.css', '', array ());
  $response->addStylesheet('ui.datepicker.css', '', array ());
  $response->addStylesheet('validationEngine.jquery.css', '', array ());
  $response->addStylesheet('/js/select2/select2.min.css', '', array ());
  $response->addJavascript('ui.core.min.js', '', array ());
  $response->addJavascript('ui.datepicker.min.js', '', array ());
  $response->addJavascript('global.js', '', array ());
  $response->addJavascript('jquery.validationEngine-vn.js', '', array ());
  $response->addJavascript('jquery.validationEngine.js', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('ckfinder/ckfinder.js', '', array ());
  $response->addJavascript('vtBackend.js', '', array ());
  $response->addJavascript('/js/select2/select2.min.js', '', array ());
  $response->addJavascript('/js/select2/update.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main_admin.css', '', array ());
  $response->addStylesheet('ui.all.css', '', array ());
  $response->addStylesheet('ui.core.css', '', array ());
  $response->addStylesheet('ui.datepicker.css', '', array ());
  $response->addStylesheet('validationEngine.jquery.css', '', array ());
  $response->addJavascript('ui.core.min.js', '', array ());
  $response->addJavascript('ui.datepicker.min.js', '', array ());
  $response->addJavascript('global.js', '', array ());
  $response->addJavascript('jquery.validationEngine-vn.js', '', array ());
  $response->addJavascript('jquery.validationEngine.js', '', array ());
  $response->addJavascript('ckeditor/ckeditor.js', '', array ());
  $response->addJavascript('ckfinder/ckfinder.js', '', array ());
  $response->addJavascript('vtBackend.js', '', array ());
}
