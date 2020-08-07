<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtManageMenu/assets') ?>
<?php include_partial('vtManageMenu/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtManageMenu/show_sidebar', array('configuration' => $configuration, 'vtp_menu' => $vtp_menu)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">

            <h1><?php echo __('Show VtManageMenu', array(), 'messages') ?></h1>

            <?php include_partial('vtManageMenu/flashes') ?>

            <?php include_partial('show_fields', array('configuration' => $configuration, 'vtp_menu' => $vtp_menu)); ?>

            <?php if (in_array('version', $fields->getRawValue())): ?>
                <?php include_partial('versions', array('vtp_menu' => $vtp_menu->getRawValue(), 'fields' => $fields)); ?>
            <?php endif; ?>

            <div class="btn-group">
                                                            <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>                                                                                <?php echo $helper->linkToEdit($vtp_menu, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>                                                                                <?php echo $helper->linkToDelete($vtp_menu, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>                                                </div>
        </div>
    </div>
</div>
<br />
<?php include_partial('vtManageMenu/footer') ?>