    <table class="table table-bordered table-striped table-show" id="show_vtManageMenu">
        <tbody>
                                    <tr>
                <th><?php echo __('Id', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_id">
<?php echo link_to( VtHelper::truncate($vtp_menu->getId(), 50, '...', true) , 'vtp_menu_edit', $vtp_menu) ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Name', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_name">
<?php echo  VtHelper::truncate($vtp_menu->getName(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Description', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_description">
<?php echo  VtHelper::truncate($vtp_menu->getDescription(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Image path', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_image_path">
<?php echo  VtHelper::truncate($vtp_menu->getImagePath(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Is active', array(), 'messages') ?></th>
            <td class="sf_admin_boolean sf_admin_list_th_is_active">
<?php echo get_partial('vtManageMenu/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_menu->getIsActive(), 50, '...', true) )) ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Lang', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_lang">
<?php echo  VtHelper::truncate($vtp_menu->getLang(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Parent', array(), 'messages') ?></th>
            <td class="sf_admin_foreignkey sf_admin_list_th_parent_id">
<?php echo  VtHelper::truncate($vtp_menu->getParentId(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Slug', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_slug">
<?php echo  VtHelper::truncate($vtp_menu->getSlug(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Link', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_link">
<?php echo  VtHelper::truncate($vtp_menu->getLink(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Level', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_level">
<?php echo  VtHelper::truncate($vtp_menu->getLevel(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Priority', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_priority">
<?php echo  VtHelper::truncate($vtp_menu->getPriority(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Is detail', array(), 'messages') ?></th>
            <td class="sf_admin_boolean sf_admin_list_th_is_detail">
<?php echo get_partial('vtManageMenu/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_menu->getIsDetail(), 50, '...', true) )) ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Type', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_type">
<?php echo  VtHelper::truncate($vtp_menu->getType(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Created by', array(), 'messages') ?></th>
            <td class="sf_admin_foreignkey sf_admin_list_th_created_by">
<?php echo  VtHelper::truncate($vtp_menu->getCreatedBy(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Updated by', array(), 'messages') ?></th>
            <td class="sf_admin_foreignkey sf_admin_list_th_updated_by">
<?php echo  VtHelper::truncate($vtp_menu->getUpdatedBy(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Created at', array(), 'messages') ?></th>
            <td class="sf_admin_date sf_admin_list_th_created_at">
<?php echo  VtHelper::truncate($vtp_menu->getCreatedAt(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Updated at', array(), 'messages') ?></th>
            <td class="sf_admin_date sf_admin_list_th_updated_at">
<?php echo  VtHelper::truncate($vtp_menu->getUpdatedAt(), 50, '...', true)  ?>
</td>                </tr>
                        </tbody>
    </table>
