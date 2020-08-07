<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtManageMenu/assets') ?>
<?php include_partial('vtManageMenu/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtManageMenu/new_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            <h1><?php echo __('Thêm mới menu', array(), 'messages') ?></h1>

            <?php include_partial('vtManageMenu/flashes') ?>

            <div id="sf_admin_header">
                <?php include_partial('vtManageMenu/form_header', array('vtp_menu' => $vtp_menu, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>

            <div id="sf_admin_content">
                <?php include_partial('vtManageMenu/form', array('vtp_menu' => $vtp_menu, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            </div>

            <div id="sf_admin_footer">
                <?php include_partial('vtManageMenu/form_footer', array('vtp_menu' => $vtp_menu, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>

<?php include_partial('vtManageMenu/footer') ?>