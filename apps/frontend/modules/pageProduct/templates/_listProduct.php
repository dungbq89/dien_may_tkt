<?php
/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 9/11/2019
 * Time: 9:59 PM
 */
?>
<div class="row shop_wrapper">
    <?php
    if (count($products) > 0) {
        foreach ($products as $product) {
            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;
            $link = url_for1('@hq_product_detail?slug=' . $product->slug);
            ?>
            <div class="col-lg-4 col-md-4 col-12 ">
                <div class="single_product">
                    <div class="product_name grid_name">
                        <h3><a href="<?php echo $link ?>"><?php echo $product->product_name ?></a></h3>
                    </div>
                    <div class="product_thumb">
                        <a class="primary_img" href="<?php echo $link ?>"><img
                                src="<?php echo VtHelper::getThumbUrl($pathImg, 227, 227) ?>"
                                alt=""></a>
                        <a class="secondary_img" href="<?php echo $link ?>"><img
                                src="<?php echo VtHelper::getThumbUrl($pathImg, 227, 227) ?>"
                                alt=""></a>

                    </div>
                    <div class="product_content grid_content">
                        <div class="content_inner">
                            <div class="product_footer d-flex align-items-center">
                                <div class="price_box">
                                            <span class="current_price">
                                                <?php echo (!empty($product->price)) ? sprintf('$%s', VtHelper::formatPrice($product->price)) : __('Contact supplier') ?>
                                            </span>
                                </div>
                                <div class="add_to_cart" data-toggle="modal" data-target="#popup_modal_box"
                                     id="bt_add_to_cart"
                                     data-link="<?php echo url_for1('@ajax_popup_inquiry_now') ?>"
                                     data-slug="<?php echo $product['slug'] ?>">
                                    <a href="javascript:void(0)" title="add to cart"><span
                                            class="lnr lnr-cart"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }
    }
    ?>


</div>
