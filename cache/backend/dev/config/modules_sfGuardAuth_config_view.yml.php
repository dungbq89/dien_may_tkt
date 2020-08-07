<?php
// auto-generated by sfViewConfigHandler
// date: 2020/08/01 02:02:50
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



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

