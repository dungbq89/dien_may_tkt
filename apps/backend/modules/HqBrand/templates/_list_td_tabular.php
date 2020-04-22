<td class="sf_admin_text sf_admin_list_td_name"
    field="name"><?php echo VtHelper::truncate($hq_brand->getName(), 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_parent_id"
    field="parent_id">
    <?php
    $parentBrand = HqBrandTable::getBrandById($hq_brand->getParentId());
    if($parentBrand){
        echo $parentBrand->name;
    }
    ?>
</td>
<td class="sf_admin_text sf_admin_list_td_priority"
    field="priority"><?php echo VtHelper::truncate($hq_brand->getPriority(), 50, '...', true) ?></td>
<td class="sf_admin_boolean sf_admin_list_td_is_active"
    field="is_active"><?php echo get_partial('HqBrand/list_field_boolean', array('value' => VtHelper::truncate($hq_brand->getIsActive(), 50, '...', true))) ?></td>