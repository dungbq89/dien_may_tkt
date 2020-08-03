<?php if (isset($valid) && $valid == '0') { ?>
    <div class="modal_title mb-10" style="text-align: center;color: green">
        <h2><?php echo __('Inquiry successful') ?></h2>
    </div>
<?php } ?>
<form action="?" name="frm" id="frm" method="post">
    <?php echo $form->renderHiddenFields() ?>
    <div class="row">
        <div class="col-2"><?php echo __('Name (*)') ?></div>
        <div class="col-10">
            <?php
            echo $form['full_name'];
            if ($form['full_name']->hasError()) {
                echo $form['full_name']->renderError();
            }
            ?>

        </div>
    </div>
    <div class="row">
        <div class="col-2"><?php echo __('Email') ?></div>
        <div class="col-10">
            <?php echo $form['email'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-2"><?php echo __('Phone (*)') ?></div>
        <div class="col-10">
            <?php
            echo $form['phone'];
            if ($form['phone']->hasError()) {
                echo $form['phone']->renderError();
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-2"><?php echo __('Country') ?></div>
        <div class="col-10">
            <?php echo $form['country'] ?>
        </div>
    </div>

<!--    <div class="row">-->
<!--        <div class="col-2">--><?php //echo __('Address') ?><!--</div>-->
<!--        <div class="col-10">-->
<!--            --><?php //echo $form['address'] ?>
<!--        </div>-->
<!--    </div>-->


    <div class="row">
        <div class="col-2"><?php echo __('Shipping term') ?></div>
        <div class="col-10">
            <?php echo $form['shipping_term'] ?>
        </div>
    </div>


<!--    <div class="row">-->
<!--        <div class="col-2">--><?php //echo __('Country') ?><!--</div>-->
<!--        <div class="col-10">-->
<!--            --><?php //echo $form['country'] ?>
<!--        </div>-->
<!--    </div>-->


<!--    <div class="row">-->
<!--        <div class="col-2">--><?php //echo __('Subject') ?><!--</div>-->
<!--        <div class="col-10">-->
<!--            --><?php //echo $form['subject'] ?>
<!--        </div>-->
<!--    </div>-->

    <div class="row">
        <div class="col-2"><?php echo __('Your requirement') ?></div>
        <div class="col-10">
            <?php echo $form['requirement'] ?>
        </div>
    </div>

<!--    <div class="row">-->
<!--        <div class="col-2">--><?php //echo __('Your message') ?><!--</div>-->
<!--        <div class="col-10">-->
<!--            --><?php //echo $form['body'] ?>
<!--        </div>-->
<!--    </div>-->

    <div class="modal_add_to_cart" id="bt_modal_add_to_cart1" data-url="<?php echo url_for1('@ajax_inquiry_now') ?>">
        <button type="submit"><?php echo __('Inquiry Now') ?></button>
    </div>
</form>