<div class="row row-small tab-slider-1" id="row-1383071846">
    <div class="col hide-for-medium small-12 large-12">
        <div class="col-inner text-center">

            <div class="tabbed-content">

                <ul class="nav nav-divided nav-uppercase nav-size-normal nav-left">
                    <?php foreach ($arrProducts as $k => $product): ?>
                        <?php if (count($product['data'])): ?>
                            <li class="tab <?php echo $k == '1' ? 'active' : '' ?> has-icon"><a
                                        href="#<?php echo $product['id'] ?>"><span><?php echo strtoupper($product['title']) ?></span></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </ul>
                <div class="tab-panels">


                    <?php foreach ($arrProducts as $k => $product): ?>
                        <?php if (count($product['data'])): ?>
                            <div class="panel <?php echo $k == '1' ? 'active' : '' ?> entry-content"
                                 id="<?php echo $product['id'] ?>">

                                <div class="row large-columns-4 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-2-hover slider row-slider slider-nav-reveal slider-nav-push"
                                     data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 5000}'>
                                    <?php foreach ($product['data'] as $pro): ?>
                                        <?php
                                        $arrCatInfo = json_decode($pro->cat_slug, true);
                                        $cat = $arrCatInfo[0];
                                        $link = url_for1(sprintf('@productDetail?cat_slug=%s&slug=%s', $cat['slug'], $pro->slug));
                                        $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $pro->image_path;
                                        $img = VtHelper::getThumbUrl($pathImg, 300, 300);
                                        ?>
                                        <div class="product-small col has-hover post-<?php echo $pro->id ?> product type-product status-publish has-post-thumbnail first instock shipping-taxable product-type-simple">
                                            <div class="col-inner">

                                                <div class="badge-container absolute left top z-1">
                                                </div>
                                                <div class="product-small box ">
                                                    <div class="box-image">
                                                        <div class="image-zoom">
                                                            <a href="<?php echo $link ?>">
                                                                <img width="300" height="300"
                                                                     src="<?php echo sfConfig::get('app_img_lazy') ?>"
                                                                     data-src="<?php echo $img ?>"
                                                                     class="lazy-load attachment-shop_catalog size-shop_catalog wp-post-image"
                                                                     alt="<?php echo $pro->product_name ?>"
                                                                     srcset=""
                                                                     data-srcset="<?php echo $img ?> 300w"
                                                                     sizes="(max-width: 300px) 300px"/>
                                                            </a>
                                                        </div>
                                                        <div class="image-tools is-small top right show-on-hover">
                                                        </div>
                                                        <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                        </div>
                                                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                        </div>
                                                    </div><!-- box-image -->

                                                    <div class="box-text box-text-products">
                                                        <div class="title-wrapper"><p
                                                                    class="name product-title"><a
                                                                        href="<?php echo $link ?>">
                                                                    <?php echo $pro->product_name ?>
                                                                </a></p></div>
                                                        <div class="price-wrapper">
                                                            <span class="price"><?php echo VtHelper::getProductPrice($pro->price) ?></span>
                                                        </div>
                                                    </div><!-- box-text -->
                                                </div><!-- box -->
                                            </div><!-- .col-inner -->
                                        </div><!-- col -->
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

    <style scope="scope">

    </style>
</div>