<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@vtp_products_category', array('class' => 'form-horizontal form-inline')) ?>
        <?php echo $form->renderHiddenFields(false) ?>

        <?php if ($form->hasGlobalErrors()): ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>

        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <div class="control-group">
                <?php include_partial('vtpManageProductsCategory/form_fieldset', array('vtp_products_category' => $vtp_products_category, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
            </div>
        <?php endforeach; ?>

        <div class="actions">
            <?php include_partial('vtpManageProductsCategory/form_actions', array('vtp_products_category' => $vtp_products_category, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>
    </form>
</div>