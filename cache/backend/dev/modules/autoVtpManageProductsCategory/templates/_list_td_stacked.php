<td colspan="3">
  <?php echo __('%%name%% - %%parent_id%% - %%is_active%%', array('%%name%%' =>  VtHelper::truncate($vtp_products_category->getName(), 50, '...', true) , '%%parent_id%%' =>  VtHelper::truncate($vtp_products_category->getParentId(), 50, '...', true) , '%%is_active%%' => get_partial('vtpManageProductsCategory/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_products_category->getIsActive(), 50, '...', true) ))), 'messages') ?>
</td>
