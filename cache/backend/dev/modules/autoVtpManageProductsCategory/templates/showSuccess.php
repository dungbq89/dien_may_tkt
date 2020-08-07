<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtpManageProductsCategory/assets') ?>
<?php include_partial('vtpManageProductsCategory/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtpManageProductsCategory/show_sidebar', array('configuration' => $configuration, 'vtp_products_category' => $vtp_products_category)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">

            <h1><?php echo __('Show VtpManageProductsCategory', array(), 'messages') ?></h1>

            <?php include_partial('vtpManageProductsCategory/flashes') ?>

            <?php include_partial('show_fields', array('configuration' => $configuration, 'vtp_products_category' => $vtp_products_category)); ?>

            <?php if (in_array('version', $fields->getRawValue())): ?>
                <?php include_partial('versions', array('vtp_products_category' => $vtp_products_category->getRawValue(), 'fields' => $fields)); ?>
            <?php endif; ?>

            <div class="btn-group">
                                                            <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>                                                                                <?php echo $helper->linkToEdit($vtp_products_category, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>                                                                                <?php echo $helper->linkToDelete($vtp_products_category, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>                                                </div>
        </div>
    </div>
</div>
<br />
<?php include_partial('vtpManageProductsCategory/footer') ?>