<?php
/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 9/10/2019
 * Time: 11:00 PM
 */
?>

<!-- modal area start-->
<!--<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">-->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <?php
                                    if (!empty($listImage)) {
                                        for ($i = 0; $i < count($listImage); $i++) {
                                            $image = $listImage[$i];
                                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $image['file_path'];
                                            ?>
                                            <div class="tab-pane fade <?php echo ($i == '0') ? 'show active' : '' ?>"
                                                 id="tab<?php echo $i ?>" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="javascript:void(0)"><img src="<?php echo $pathImg ?>"
                                                                                      alt=""></a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <?php
                                        if (!empty($listImage)) {
                                            for ($i = 0; $i < count($listImage); $i++) {
                                                $image = $listImage[$i];
                                                $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $image['file_path'];
                                                ?>
                                                <li>
                                                    <a class="nav-link <?php echo $i == '0' ? 'active' : '' ?>"
                                                       data-toggle="tab" href="#tab<?php echo $i ?>" role="tab"
                                                       aria-controls="tab<?php echo $i ?>" aria-selected="false"><img
                                                            src="<?php echo VtHelper::getThumbUrl($pathImg, 90, 90) ?>"
                                                            alt=""></a>
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
                            <div class="modal_right">
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
                                        <div class="row">
                                            <div class="col-12">
                                                <p style="font-weight: bold"><?php echo __('Please fill full information to get quotation quickly') ?> </p>
                                            </div>
                                        </div>
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
                                        <?php include_partial('pageProduct/inquiryNowForm', array('form' => $form)) ?>
                                    </div>
                                    <div class="modal_social">
                                        <h2><?php echo __('Share this product') ?></h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="modal_title mb-10">
                                        <h2><?php echo __('Data not found!') ?></h2>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--</div>-->

<!-- modal area end-->
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