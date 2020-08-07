    <table class="table table-bordered table-striped table-show" id="show_vtpManageProductsCategory">
        <tbody>
                                    <tr>
                <th><?php echo __('Id', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_id">
<?php echo link_to( VtHelper::truncate($vtp_products_category->getId(), 50, '...', true) , 'vtp_products_category_edit', $vtp_products_category) ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Name', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_name">
<?php echo  VtHelper::truncate($vtp_products_category->getName(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Address', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_address">
<?php echo  VtHelper::truncate($vtp_products_category->getAddress(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Image path', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_image_path">
<?php echo  VtHelper::truncate($vtp_products_category->getImagePath(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Link', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_link">
<?php echo  VtHelper::truncate($vtp_products_category->getLink(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Priority', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_priority">
<?php echo  VtHelper::truncate($vtp_products_category->getPriority(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Is active', array(), 'messages') ?></th>
            <td class="sf_admin_boolean sf_admin_list_th_is_active">
<?php echo get_partial('vtpManageProductsCategory/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_products_category->getIsActive(), 50, '...', true) )) ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Is home', array(), 'messages') ?></th>
            <td class="sf_admin_boolean sf_admin_list_th_is_home">
<?php echo get_partial('vtpManageProductsCategory/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_products_category->getIsHome(), 50, '...', true) )) ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Lang', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_lang">
<?php echo  VtHelper::truncate($vtp_products_category->getLang(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Description', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_description">
<?php echo  VtHelper::truncate($vtp_products_category->getDescription(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Slug', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_slug">
<?php echo  VtHelper::truncate($vtp_products_category->getSlug(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Portal', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_portal_id">
<?php echo  VtHelper::truncate($vtp_products_category->getPortalId(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Meta', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_meta">
<?php echo  VtHelper::truncate($vtp_products_category->getMeta(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Keywords', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_keywords">
<?php echo  VtHelper::truncate($vtp_products_category->getKeywords(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Parent', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_parent_id">
<?php echo  VtHelper::truncate($vtp_products_category->getParentId(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Level', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_level">
<?php echo  VtHelper::truncate($vtp_products_category->getLevel(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Lat', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_lat">
<?php echo  VtHelper::truncate($vtp_products_category->getLat(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Log', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_log">
<?php echo  VtHelper::truncate($vtp_products_category->getLog(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Parameter ids', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_parameter_ids">
<?php echo  VtHelper::truncate($vtp_products_category->getParameterIds(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('List image', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_list_image">
<?php echo  VtHelper::truncate($vtp_products_category->getListImage(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Email', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_email">
<?php echo  VtHelper::truncate($vtp_products_category->getEmail(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Msisdn', array(), 'messages') ?></th>
            <td class="sf_admin_text sf_admin_list_th_msisdn">
<?php echo  VtHelper::truncate($vtp_products_category->getMsisdn(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Created by', array(), 'messages') ?></th>
            <td class="sf_admin_foreignkey sf_admin_list_th_created_by">
<?php echo  VtHelper::truncate($vtp_products_category->getCreatedBy(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Updated by', array(), 'messages') ?></th>
            <td class="sf_admin_foreignkey sf_admin_list_th_updated_by">
<?php echo  VtHelper::truncate($vtp_products_category->getUpdatedBy(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Created at', array(), 'messages') ?></th>
            <td class="sf_admin_date sf_admin_list_th_created_at">
<?php echo  VtHelper::truncate($vtp_products_category->getCreatedAt(), 50, '...', true)  ?>
</td>                </tr>
                                                <tr>
                <th><?php echo __('Updated at', array(), 'messages') ?></th>
            <td class="sf_admin_date sf_admin_list_th_updated_at">
<?php echo  VtHelper::truncate($vtp_products_category->getUpdatedAt(), 50, '...', true)  ?>
</td>                </tr>
                        </tbody>
    </table>
