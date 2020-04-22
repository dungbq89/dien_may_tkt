<td class="sf_admin_text sf_admin_list_td_name"
    field="name"><?php echo VtHelper::truncate($vtp_products_category->getName(), 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_parent_id"
    field="parent_id"><?php echo VtHelper::truncate($vtp_products_category->getParentName(), 50, '...', true) ?></td>
<td class="sf_admin_boolean sf_admin_list_td_is_active"
    field="is_active"><?php echo get_partial('vtpManageProductsCategory/list_field_boolean', array('value' => VtHelper::truncate($vtp_products_category->getIsActive(), 50, '...', true))) ?></td>