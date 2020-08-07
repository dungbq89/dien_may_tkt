<?php use_helper('I18N', 'Date') ?>
<?php include_partial('vtpManageProductsCategory/assets') ?>
<?php include_partial('vtpManageProductsCategory/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('vtpManageProductsCategory/new_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            <h1><?php echo __('Thêm mới chuyên mục sản phẩm', array(), 'messages') ?></h1>

            <?php include_partial('vtpManageProductsCategory/flashes') ?>

            <div id="sf_admin_header">
                <?php include_partial('vtpManageProductsCategory/form_header', array('vtp_products_category' => $vtp_products_category, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>

            <div id="sf_admin_content">
                <?php include_partial('vtpManageProductsCategory/form', array('vtp_products_category' => $vtp_products_category, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            </div>

            <div id="sf_admin_footer">
                <?php include_partial('vtpManageProductsCategory/form_footer', array('vtp_products_category' => $vtp_products_category, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>

<?php include_partial('vtpManageProductsCategory/footer') ?>