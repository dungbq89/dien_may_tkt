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
    .result-message {
        color: green;
        font-weight: bold;
    }
</style>
<div class="grid grid-pad" style="background:#FFF">
    <div class="crumb hide-on-mobile">
        <a href="/"><?php echo __('Trang chủ'); ?></a> <i class="fa fa-angle-right"></i> <a href="#"><?php echo __('Liên hệ'); ?></a>
    </div>
    <div class="c30"></div>
    <div class="result-message">
        <?php if ($sf_user->hasFlash('success')): ?>
            <span><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></span>
        <?php endif; ?>
    </div>
    <div class="hd"><?php echo __('Gửi phản hồi của bạn'); ?></div>
    <div class="frm-feedback">
        <form action="" method="post" id="contactform">
            <?php echo $form->renderHiddenFields() ?>
            <div class="c10"></div>
            <div><strong><?php echo  __('Tiêu đề');?>(*)</strong></div>
            <div>
                <?php
                echo $form['title']->render(array('class' =>'txt-contact'));
                if ($form['title']->hasError()) {
                    echo '<span class="help-inline">' . $form['title']->renderError() . '</span>';
                } ?>
            </div>
            <div><strong><?php echo  __('Họ tên');?>(*)</strong></div>
            <div>
                <?php
                echo $form['name']->render(array('class' => 'txt-contact'));
                if ($form['name']->hasError()) {
                    echo '<span class="help-inline">' . $form['name']->renderError() . '</span>';
                } ?>
            </div>
            <div><strong><?php echo  __('Email');?></strong></div>
            <div>
                <?php
                echo $form['email']->render(array('class' => 'txt-contact'));
                if ($form['email']->hasError()) {
                    echo '<span class="help-inline">' . $form['email']->renderError() . '</span>';
                } ?>
            </div>
            <div><strong><?php echo  __('Số điện thoại');?></strong></div>
            <div>
                <?php
                echo $form['phone']->render(array('class' => 'txt-contact'));
                if ($form['phone']->hasError()) {
                    echo '<span class="help-inline">' . $form['phone']->renderError() . '</span>';
                } ?>
            </div>

            <div><strong><?php echo  __('Nội dung');?>(*)</strong></div>
            <div>
                <?php
                echo $form['message']->render(array('class' =>'txt-contact', 'style'=>'height: 150px;'));
                if ($form['message']->hasError()) {
                    echo '<span class="help-inline">' . $form['message']->renderError() . '</span>';
                } ?>
            </div>
            <div style="margin-top: 10px;"><strong><?php echo  __('Mã bảo mật');?></strong>
                <?php echo $form['captcha']->render(array('style'=>'vertical-align: top; height: 30px;'));
                if ($form['captcha']->hasError()) {
                    echo '<span class="help-inline">' . $form['captcha']->renderError() . '</span>';
                } ?>
            </div>
            <div class="c30"></div>
            <div>
                <button name="" type="submit" class="btn-send" style=""><?php echo __('Gửi liên hệ'); ?></button>
            </div>
            <div>
                <div class="result-message">
                    <?php if ($sf_user->hasFlash('success')): ?>
                        <span><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></span>
                    <?php endif; ?>
                </div>
            </div>


        </form>
    </div>
</div>