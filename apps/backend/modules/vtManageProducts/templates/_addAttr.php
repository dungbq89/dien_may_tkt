<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
$listAttr = $vtp_products->getAllListAttr();
if ($listAttr !== false) :
    ?>
    <div class="control-group sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_category_id">

        <label class="control-label" for="vtp_products_category_id">Chọn thuộc tính</label>
        <div class="controls">
            <div class="field-content">
                <select class="js-example-basic-multiple2" name="vtattr">
                    <?php foreach ($listAttr as $key => $attr): ?>
                        <option value="<?php $key ?>"><?php echo $attr ?></option>
                    <?php endforeach; ?>
                    <!--                    <option value="WY" disabled="disabled">Wyoming</option>-->
                    <!--                    <option value="WY1">Wyoming1</option>-->
                    <!--                    <option value="WY2">Wyoming2</option>-->
                    <!--                    <option value="WY3">Wyoming3</option>-->
                </select>
                <input class="btn btn-primary" type="button" value="Thêm thuộc tính" name="_add_attr">
            </div>

        </div>
    </div>
    <div class="sf_admin_list" id="tb_attr">

    </div>

    <script type="text/javascript">
        var url = "<?php echo url_for1(sprintf('@vtp_products_object?id=%s&action=%s', $vtp_products->id, 'ajaxAttr')) ?>>";
        $(document).ready(function () {
            // $('.js-example-basic-multiple').select2();
            loadTbAttr();

        });

        function loadTbAttr() {
            $.ajax({
                url: url,
                cache: false,
                data: {},
                success: function (result) {
                    if (result.errCode == '0') {
                        $('#tb_attr').html(result.html);
                        $('.js-example-basic-multiple').select2();
                    }
                },
                error: function (request, status, err) {
                }
            });
        }

        $("#LangTable").on("click", ".deletelanguage", function () {
            alert("success");
        });
    </script>
<?php endif; ?>