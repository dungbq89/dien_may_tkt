<h2><?php echo __('Version history', null, 'tmcTwitterBootstrapPlugin') ?></h2>
<div class="clearfix" style="margin-bottom:18px">
    <?php $all_versions = Doctrine_Query::create()->from(get_class($vtp_products_category->getRawValue()) . 'Version fv')->where('fv.id = ?', $vtp_products_category->getId())->andWhere('fv.version <> ?', $vtp_products_category->get('version'))->orderBy('fv.version DESC')->execute(); ?>
    <?php if ($all_versions->count() == 0): ?>
    <em><?php echo __('No versions found', null, 'tmcTwitterBootstrapPlugin') ?></em>
    <?php else: ?>
        <script type="text/javascript">
            $(function() {
                $('.tabs').tabs();
            });
        </script>
        <ul class="tabs">
            <?php $shotgun = true; ?>
            <?php foreach ($all_versions as $version): ?>
                <li <?php if ($shotgun == true) { echo 'class="active"'; $shotgun = false; } ?>><a href="#version_<?php echo $version->get('version'); ?>"><?php echo $version->get('version'); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="pill-content">
            <?php $shotgun = true; ?>
            <?php foreach ($all_versions as $version): ?>
            <div id="version_<?php echo $version->get('version'); ?>" <?php if ($shotgun == true) { echo 'class="active"'; $shotgun = false; } ?>>
                <div class="clearfix" style="margin-bottom: 10px">
                    <a class="btn primary" href="#" onclick="if (confirm('<?php echo __("Are you sure?", null, "tmcTwitterBootstrapPlugin") ?>')) { window.location = '<?php echo url_for('@vtp_products_category_show?id='.$vtp_products_category->getId()) ?>/revert?version=<?php echo $version->get('version'); ?>' }"><?php echo __('Revert to version', null, 'tmcTwitterBootstrapPlugin') ?> #<?php echo $version->get('version'); ?></a>
                </div>

                <?php include_partial('show_version_fields', array('fields' => $fields, 'object' => $version, 'original' => $vtp_products_category));?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>