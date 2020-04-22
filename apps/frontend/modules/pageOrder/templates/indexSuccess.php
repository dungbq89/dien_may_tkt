<style>
    .bookingform .item textarea {
        height: 100px;
    }

    .error_list li {
        color: red;
    }

    ul, li, p, img {
        border: medium none;
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }

    .btn-book {
        border-radius: 3px;
        cursor: pointer;
    }

    #booking_captcha {
        height: 30px;
        vertical-align: top;
        width: 80px !important;
    }

    .result-message {
        color: green;
        font-weight: bold;
    }
</style>

<div class="grid grid-pad" style="background:#FFF">
    <div class="c20"></div>
    <div class="col-1-1">
        <div class="crumb hide-on-mobile">
            <a href="/"><?php echo __('Trang chủ'); ?></a> /
        </div>
        <div class="c20"></div>
        <h2 class="title-first-home">
            <span><?php echo __('Đặt phòng'); ?></span>
        </h2>
    </div>
    <div class="c20"></div>
    <div style="border:solid 1px #CCC; background:#AEA196; padding:25px; max-width:600px; margin:0 auto">
        <div style="text-transform:uppercase; font-size:18px; color:#FFF"><?php echo __('Đặt phòng'); ?></div>
        <div class="c20"></div>
        <form action="" method="post" id="bookingform" name="bookingform">
            <?php echo $form->renderHiddenFields() ?>
            <input type="hidden" value="save" name="code">
            <div class="bookingform">
                <div class="item">
                    <div class="result-message">
                        <?php if ($sf_user->hasFlash('success')): ?>
                            <span><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="c5"></div>
                <div class="item">
                    <?php echo $form['full_name']->render(array('placeholder' => __('Họ tên')));
                    if ($form['full_name']->hasError()) {
                        echo '<span class="help-inline">' . $form['full_name']->renderError() . '</span>';
                    } ?>
                </div>
                <div class="item">
                    <?php echo $form['phone']->render(array('placeholder' => __('Số điện thoại')));
                    if ($form['phone']->hasError()) {
                        echo '<span class="help-inline">' . $form['phone']->renderError() . '</span>';
                    } ?>
                </div>
                <div class="item">
                    <?php echo $form['email']->render(array('placeholder' => __('Email')));
                    if ($form['email']->hasError()) {
                        echo '<span class="help-inline">' . $form['email']->renderError() . '</span>';
                    } ?>
                </div>
                <div class="item">
                    <?php echo $form['category_id']->render(array());
                    if ($form['category_id']->hasError()) {
                        echo '<span class="help-inline">' . $form['category_id']->renderError() . '</span>';
                    } ?>
                </div>
                <div class="item">
                    <?php echo $form['product_id']->render(array());
                    if ($form['product_id']->hasError()) {
                        echo '<span class="help-inline">' . $form['product_id']->renderError() . '</span>';
                    } ?>
                </div>
                <div class="row-booking">
                    <div class="item-1-2">
                        <div class="item">
                            <?php echo $form['from_time']->render(array('class' => 'datepk'));
                            if ($form['from_time']->hasError()) {
                                echo '<span class="help-inline">' . $form['from_time']->renderError() . '</span>';
                            } ?>
                        </div>
                    </div>
                    <div class="item-1-2">
                        <div class="item">
                            <?php echo $form['to_time']->render(array('class' => 'datepk'));
                            if ($form['to_time']->hasError()) {
                                echo '<span class="help-inline">' . $form['to_time']->renderError() . '</span>';
                            } ?>
                        </div>
                    </div>
                    <div class="c"></div>
                </div>
                <div class="row-booking">
                    <div class="item-1-2">
                        <div class="item" style="color:#FFF">
                            <?php echo __('Số lượng người') ?>
                            <?php echo $form['number_person']->render(array());
                            if ($form['number_person']->hasError()) {
                                echo '<span class="help-inline">' . $form['number_person']->renderError() . '</span>';
                            } ?>
                        </div>
                    </div>
                    <div class="item-1-2">
                        <div class="item" style="color:#FFF">
                            <?php echo __('Số lượng phòng') ?>
                            <?php echo $form['number_room']->render(array());
                            if ($form['number_room']->hasError()) {
                                echo '<span class="help-inline">' . $form['number_room']->renderError() . '</span>';
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <?php echo $form['body']->render(array('placeholder' => __('Nội dung'), 'rows' => '5'));
                    if ($form['body']->hasError()) {
                        echo '<span class="help-inline">' . $form['body']->renderError() . '</span>';
                    } ?>
                </div>
                <div class="row-booking">
                    <div class="item-1-2">
                        <div class="item">
                            <span style="color: #fff;"><?php echo __('Captcha') ?></span>
                            <div>
                                <?php echo $form['captcha']->render(array());
                                if ($form['captcha']->hasError()) {
                                    echo '<span class="help-inline">' . $form['captcha']->renderError() . '</span>';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c5"></div>
                <div class="item">
                    <div class="result-message">
                        <?php if ($sf_user->hasFlash('success')): ?>
                            <span><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="c5"></div>
                <button name="" type="submit" class="btn-book" style=""><?php echo __('Đặt phòng'); ?></button>
            </div>
        </form>
    </div>
    <div class="c10"></div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#booking_category_id").change(function () {
            var categoryId = $("#booking_category_id").val();
            var url = "<?php echo url_for('@get_product_by_catid'); ?>";
            $.ajax({
                type: "GET",
                url: url,
                cache: true,
                data: {
                    catid: categoryId
                },
                success: function (data) {
                    obj = $.parseJSON(data);
                    $("#booking_product_id").html(obj);
                },
                error: function () {
                }
            });
        });
    });
</script>