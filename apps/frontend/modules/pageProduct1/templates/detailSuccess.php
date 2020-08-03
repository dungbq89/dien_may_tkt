<?php
$listImage = $product->getListImage();
$imageFirst = [];
$pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;
?>
<!--breadcrumbs area start-->
<?php
include_component('moduleMenu', 'breadscrumbs', array('arrBread' => array(__('Product Detail'))));
?>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">

                        <h1><?php echo htmlentities($product->product_name) ?></h1>
                        <div class="price_box">
                            <span
                                class="current_price"><?php echo $product->price ? '$' . VtHelper::formatPrice($product->price) : __('Contact supplier') ?></span>
                            <?php if ($product->price_promotion) { ?>
                                <span
                                    class="old_price"><?php echo $product->price_promotion ? '$' . VtHelper::formatPrice($product->price_promotion) : '' ?></span>
                            <?php } ?>
                        </div>
                        <div class="product_desc">
                            <p>
                                <?php echo nl2br(htmlspecialchars(($product->description))) ?>
                            </p>
                        </div>
                        <div class="product_variant quantity">
                            <!--                            <label>quantity</label>-->
                            <!--                            <input min="0" max="100" value="1" type="number">-->
<!--                            <button class="button" type="button" data-toggle="modal"-->
<!--                                    data-target="#modal_box">--><?php //echo __('Inquiry Now') ?><!--</button>-->
                            <a href="<?php echo url_for1('@pageInquiryNow?slug='.$product->slug) ?>">
                            <button class="button" type="button"><?php echo __('Inquiry Now') ?></button>
                            </a>
                        </div>
                    </form>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i>
                                    Like</a>
                            </li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a>
                            </li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a>
                            </li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                    share</a>
                            </li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                   aria-selected="false"><?php echo __('Description') ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <?php echo VtHelper::strip_html_tags_and_decode($product->content); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<?php include_component('pageProduct', 'productRelated', array('catId' => $product->category_id)) ?>

<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <?php include_partial('pageProduct/inquiryNow', array(
        'product' => $product,
        'imageFirst' => $imageFirst,
        'pathImg' => $pathImg,
        'listImage' => $listImage,
        'form' => $inquiryNowForm,
    )) ?>
</div>
