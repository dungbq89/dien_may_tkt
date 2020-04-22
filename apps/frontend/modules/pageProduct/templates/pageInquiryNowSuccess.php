<?php
$listImage = $product->getListImage();
$imageFirst = [];
$pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;
?>
<?php
include_component('moduleMenu', 'breadscrumbs', array('arrBread' => array(__('Product Detail'))));
?>

<!--product details start-->
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="product-details-tab">

                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <?php

                            ?>
                            <img id="zoom1"
                                 src="<?php echo VtHelper::getThumbUrl($pathImg, 538, 538) ?>"
                                 data-zoom-image="<?php echo $pathImg ?>" alt="big-1">
                        </a>
                    </div>

                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                   data-image="<?php echo $pathImg ?>"
                                   data-zoom-image="<?php echo $pathImg ?>">
                                    <img src="<?php echo VtHelper::getThumbUrl($pathImg, 95, 95) ?>"
                                         alt="zo-th-1"/>
                                </a>

                            </li>
                            <?php
                            if (!empty($listImage)) {
                                for ($i = 0; $i < count($listImage); $i++) {
                                    $image = $listImage[$i];
                                    $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $image['file_path'];
                                    ?>
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                           data-image="<?php echo $pathImg ?>"
                                           data-zoom-image="<?php echo $pathImg ?>">
                                            <img src="<?php echo VtHelper::getThumbUrl($pathImg, 95, 95) ?>"
                                                 alt="zo-th-1"/>
                                        </a>

                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="product_d_right">
                    <?php
                    if (!empty($product)) {
                        ?>
                        <div class="modal_title mb-10">
                            <h2><?php echo htmlentities($product->product_name) ?></h2>
                        </div>
                        <div class="modal_price mb-10">
                                    <span
                                        class="new_price"><?php echo $product->price ? '$' . VtHelper::formatPrice($product->price) : '' ?></span>
                                    <span
                                        class="old_price"><?php echo $product->price_promotion ? '$' . VtHelper::formatPrice($product->price_promotion) : '' ?></span>
                        </div>
                        <div class="modal_description mb-15">
<!--                            <div class="row">-->
<!--                                <div class="col-12">-->
<!--                                    <p style="font-weight: bold">--><?php //echo __('Dried Ginger') ?><!-- </p>-->
<!--                                </div>-->
<!--                            </div>-->
                            <?php if ($product->brand) {
                                $objBrand = $product->getObjBrand();
                                ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Brand') ?></div>
                                    <div
                                        class="col-9"><?php echo ($objBrand) ? $objBrand->name : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->origin) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Origin') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->origin) ? $product->origin : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->reference_price) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Reference price') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->reference_price) ? $product->reference_price : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->unit) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Unit count') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->unit) ? $product->unit : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->payment) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Payment') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->payment) ? $product->payment : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->delivery) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Delivery') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->delivery) ? $product->delivery : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->port) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Port') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->port) ? $product->port : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->supply_ability) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Supply ability') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->supply_ability) ? $product->supply_ability : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->packing) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Packing') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->packing) ? $product->packing : '' ?></div>
                                </div>
                            <?php } ?>
                            <?php if ($product->special_req) { ?>
                                <div class="row">
                                    <div class="col-3"><?php echo __('Special requirements') ?></div>
                                    <div
                                        class="col-9"><?php echo ($product->special_req) ? $product->special_req : '' ?></div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="variants_selects">
                            <p style="color: red;"><?php echo __('Please fill full information to get quotation quickly'); ?></p>
                            <?php include_partial('pageProduct/inquiryNowForm', array('form' => $form, 'valid' => $valid)) ?>
                        </div>
                        <?php
                    } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<style type="text/css">
    .modal_description.mb-15 .row {
        border-bottom: 1px solid #999;
        line-height: 40px;
    }

    .variants_selects .row {
        padding-bottom: 10px;
    }

    .variants_selects .col-2 {
        font-weight: bold;
    }

    .variants_selects .col-10 input, .variants_selects .col-10 textarea {
        width: 100%;
    }

    form .modal_add_to_cart button {
        background: none;
        border: 1px solid #333;
        margin-left: 10px;
        font-size: 12px;
        font-weight: 700;
        height: 45px;
        width: 230px;
        line-height: 18px;
        padding: 10px 15px;
        text-transform: uppercase;
        background: #333;
        color: #ffffff;
        -webkit-transition: 0.3s;
        transition: 0.3s;
        cursor: pointer;
    }

    form .modal_add_to_cart button:hover {
        background: #ffd54c;
        color: #ffffff;
        border-color: #ffd54c;
    }
</style>
