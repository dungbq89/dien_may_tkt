<?php
if ($ad_manage_attr->parent == '0') {
    $listChildAttr = $ad_manage_attr->getListChildAttr();
    if ($listChildAttr) {

        $helper = new AdManageAttrGeneratorHelper();
        ?>
        <div class="sf_admin_list">
            <table class="datatable table table-bordered table-striped" id="table_ad_manage_attr"
                   style="margin-top: 5px !important;">
                <thead>
                <tr>


                    <th class="sf_admin_text sf_admin_list_th_name" style="text-align: center">
                        Tên thuộc tính
                    </th>
                    <th class="sf_admin_text sf_admin_list_th_name" style="text-align: center">
                        Trạng thái
                    </th>
                    <th class="sf_admin_text sf_admin_list_th_name" style="text-align: center">
                        Sắp sếp
                    </th>

                    <th id="sf_admin_list_th_actions" style="width: 170px;text-align: center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listChildAttr as $attr) : ?>
                    <tr class="sf_admin_row odd {pk: 1}" rel="1">
                        <td class="sf_admin_text sf_admin_list_td_name"
                            field="name"><?php echo $attr->name ?></td>
                        <td class="sf_admin_text sf_admin_list_td_name"
                            field="name"><?php echo $attr->status ?></td>
                        <td class="sf_admin_text sf_admin_list_td_name"
                            field="name"><?php echo $attr->priority ?></td>

                        <td nowrap="nowrap">
                            <div class="btn-group">
                                <?php echo $helper->linkToEdit($attr, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>

                                <?php echo $helper->linkToDelete($attr, array('params' => array('parent' => $ad_manage_attr->parent), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        $('#sf_fieldset_thu___c_t__nh_con').parent().css('display', 'none');
    </script>

    <?php
}
?>