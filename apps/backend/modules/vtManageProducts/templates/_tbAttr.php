<?php
// lay danh sach thuoc tinh
$listAttr = $vtProduct->getListAttrByProduct(false);
$attrParent = [];
$attrChildId = [];
foreach ($listAttr as $attr) {
    if ($attr->attr_type == '1') $attrParent[] = $attr;
    if ($attr->attr_type == '2') $attrChildId[] = $attr->attr_id;
}
?>
<table class="datatable table table-bordered table-striped" id="table_ad_manage_attr"
       style="margin-top: 5px !important;">
    <thead>
    <tr>
        <th class="sf_admin_text sf_admin_list_th_name" style="text-align: center">
            Tên thuộc tính
        </th>
        <th class="sf_admin_text sf_admin_list_th_name" style="text-align: center">
            Giá trị
        </th>
        <th class="sf_admin_text sf_admin_list_th_name" style="text-align: center">
            Thao tác
        </th>


    </tr>
    </thead>
    <tbody>
    <?php foreach ($attrParent as $attr):
        // lay danh sach thuoc tinh con
        $objAttr = $attr->getObjAttr();
        $attrChild = false;
        if ($objAttr)
            $attrChild = $objAttr->getListChildAttr();
        ?>
        <tr class="sf_admin_row odd {pk: 1}" rel="1">
            <td class="sf_admin_text sf_admin_list_td_name"
                field="name"><?php echo $objAttr ? $objAttr->name : '' ?>
            </td>
            <td class="sf_admin_text sf_admin_list_td_name"
                field="name">
                <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                    <?php if ($attrChild):
                        foreach ($attrChild as $child):
                            ?>
                            <option value="<?php echo $child->id ?>" <?php echo !in_array($child->id, $attrChildId) ? '' : ''; ?>><?php echo $child->name ?></option>
                        <?php endforeach; endif; ?>
                    <!--                    <option value="WY">Wyoming</option>-->
                    <!--                    <option value="WY1">Wyoming1</option>-->
                    <!--                    <option value="WY2">Wyoming2</option>-->
                    <!--                    <option value="WY3">Wyoming3</option>-->
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
