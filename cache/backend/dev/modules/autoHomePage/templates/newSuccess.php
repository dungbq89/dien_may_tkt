<?php use_helper('I18N', 'Date') ?>
<?php include_partial('homePage/assets') ?>
<?php include_partial('homePage/header') ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($sidebar_status): ?>
            <?php include_partial('homePage/new_sidebar', array('configuration' => $configuration)) ?>
        <?php endif; ?>

        <div class="span<?php echo $sidebar_status ? '10' : '12'; ?>">
            <h1><?php echo __('New HomePage', array(), 'messages') ?></h1>

            <?php include_partial('homePage/flashes') ?>

            <div id="sf_admin_header">
                <?php include_partial('homePage/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>

            <div id="sf_admin_content">
                <?php include_partial('homePage/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            </div>

            <div id="sf_admin_footer">
                <?php include_partial('homePage/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>

<?php include_partial('homePage/footer') ?>