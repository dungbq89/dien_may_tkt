<?php
/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 9/10/2019
 * Time: 9:57 PM
 */
?>
<!--product area start-->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong><?php echo __('Related') ?></strong><?php echo __('Products') ?></span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    <?php
                    if ($products) {
                        for ($i = 0; $i < count($products); $i++) {
                            $product = $products[$i];
                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product['image_path'];
                            ?>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="<?php echo url_for1('@hq_product_detail?slug=' . $product['slug']) ?>">
                                            <?php echo $product['product_name'] ?></a></h3>

                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img"
                                       href="<?php echo url_for1('@hq_product_detail?slug=' . $product['slug']) ?>"><img
                                            src="<?php echo VtHelper::getThumbUrl($pathImg, 180, 180) ?>" alt=""></a>
                                    <a class="secondary_img"
                                       href="<?php echo url_for1('@hq_product_detail?slug=' . $product['slug']) ?>"><img
                                            src="<?php echo VtHelper::getThumbUrl($pathImg, 180, 180) ?>" alt=""></a>

                                    <!--                                    <div class="label_product">-->
                                    <!--                                        <span class="label_sale">-57%</span>-->
                                    <!--                                    </div>-->

                                    <!--                                    <div class="action_links">-->
                                    <!--                                        <ul>-->
                                    <!--                                            <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"-->
                                    <!--                                                                        title="quick view"> <span-->
                                    <!--                                                        class="lnr lnr-magnifier"></span></a></li>-->
                                    <!--                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span-->
                                    <!--                                                        class="lnr lnr-heart"></span></a></li>-->
                                    <!--                                            <li class="compare"><a href="#" title="compare"><span-->
                                    <!--                                                        class="lnr lnr-sync"></span></a></li>-->
                                    <!--                                        </ul>-->
                                    <!--                                    </div>-->
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span
                                                class="regular_price"><?php echo (!empty($product['price']) && $product['price'] != '') ? sprintf('$%s', $product['price']) : __('Contact supplier') ?></span>
                                        </div>
                                        <div class="add_to_carjavascript:void(0)" title="add to cart"
                                             id="bt_add_to_cart1"
                                             data-link="<?php echo url_for1('@ajax_popup_inquiry_now') ?>"
                                             data-slug="<?php echo $product['slug'] ?>">
                                            <a href="<?php echo url_for1('@pageInquiryNow?slug='.$product['slug']) ?>">
                                                <span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
</section>
<!--product area end-->
