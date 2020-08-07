  
  <td class="sf_admin_text sf_admin_list_td_image_path" field="image_path"><?php echo  VtHelper::truncate($vtp_menu->getImagePath(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_name" field="name"><?php echo  VtHelper::truncate($vtp_menu->getName(), 50, '...', true)  ?></td>      
  <td class="sf_admin_text sf_admin_list_td_description" field="description"><?php echo  VtHelper::truncate($vtp_menu->getDescription(), 50, '...', true)  ?></td>      
  <td class="sf_admin_boolean sf_admin_list_td_is_active" field="is_active"><?php echo get_partial('vtManageMenu/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_menu->getIsActive(), 50, '...', true) )) ?></td>      
  <td class="sf_admin_text sf_admin_list_td_priority" field="priority"><?php echo  VtHelper::truncate($vtp_menu->getPriority(), 50, '...', true)  ?></td>    