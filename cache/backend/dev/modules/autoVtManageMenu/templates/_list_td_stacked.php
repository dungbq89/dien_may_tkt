<td colspan="5">
  <?php echo __('%%image_path%% - %%name%% - %%description%% - %%is_active%% - %%priority%%', array('%%image_path%%' =>  VtHelper::truncate($vtp_menu->getImagePath(), 50, '...', true) , '%%name%%' =>  VtHelper::truncate($vtp_menu->getName(), 50, '...', true) , '%%description%%' =>  VtHelper::truncate($vtp_menu->getDescription(), 50, '...', true) , '%%is_active%%' => get_partial('vtManageMenu/list_field_boolean', array('value' =>  VtHelper::truncate($vtp_menu->getIsActive(), 50, '...', true) )), '%%priority%%' =>  VtHelper::truncate($vtp_menu->getPriority(), 50, '...', true) ), 'messages') ?>
</td>