<?php if (count($arrData)): ?>
    <?php foreach ($arrData as $cat): ?>
        <div class="row row-small catelogy-section" id="row-<?php echo $cat['id'] ?>">
            <div class="col small-12 large-12">
                <div class="col-inner">
                    <div class="catelogy-title">
                        <div class="catelogy-title-left">
                            <h3><a href="<?php echo url_for1(sprintf('@cat_product?slug=%s', $cat['slug'])) ?>"><?php echo $cat['title'] ?></a></h3>
                        </div>
                        <?php if (count($cat['subCat'])): ?>
                            <div class="catelogy-title-right">
                                <ul>
                                    <?php foreach ($cat['subCat'] as $subCatIt): ?>
                                        <li>
                                            <a href="<?php echo url_for1(sprintf('@cat_product?slug=%s', $subCatIt['slug'])) ?>"
                                               target="blank"
                                               rel="noopener noreferrer"><?php echo $subCatIt['title'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>


                    <div class="row large-columns-5 medium-columns-3 small-columns-2 row-collapse has-shadow row-box-shadow-1 row-box-shadow-2-hover">

                        <?php foreach ($cat['data'] as $idx => $pro): ?>
                            <?php
                            $arrCatInfo = json_decode($pro->cat_slug, true);
//                            $cat = $arrCatInfo[0];
                            $link = url_for1(sprintf('@productDetail?cat_slug=%s&slug=%s', $cat['slug'], $pro->slug));
                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $pro->image_path;
                            $img = VtHelper::getThumbUrl($pathImg, 300, 300);
                            ?>
                            <div class="product-small col has-hover post-<?php echo $pro->id ?> product type-product status-publish has-post-thumbnail <?php echo ($idx == '0' || $idx == '4') ? 'first' : '' ?>  instock sale shipping-taxable purchasable product-type-simple">
                                <div class="col-inner">
                                    <?php if ($pro->price_promotion): ?>
                                        <div class="badge-container absolute left top z-1">
                                            <div class="callout badge badge-square">
                                                <div class="badge-inner secondary on-sale"><span
                                                            class="onsale"><?php echo sprintf('-%s', $pro->price_promotion) ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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
                                                         sizes="(max-width: 300px) 100vw, 300px"/> </a>
                                            </div>
                                            <div class="image-tools is-small top right show-on-hover">
                                            </div>
                                            <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                            </div>
                                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                            </div>
                                        </div><!-- box-image -->

                                        <div class="box-text box-text-products">
                                            <div class="title-wrapper"><p class="name product-title"><a
                                                            href="<?php echo $link ?>">
                                                        <?php echo $pro->product_name ?>
                                                    </a></p></div>
                                            <div class="price-wrapper">
                                                        <span class="price"><del><span
                                                                        class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($pro->price) ?><span
                                                                            class="woocommerce-Price-currencySymbol"><?php echo $pro->price?'&#8363;':'' ?></span></span></del> <ins><span
                                                                        class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($pro->price) ?><span
                                                                            class="woocommerce-Price-currencySymbol"><?php echo $pro->price?'&#8363;':'' ?></span></span></ins></span>
                                            </div>
                                        </div><!-- box-text -->
                                    </div><!-- box -->
                                </div><!-- .col-inner -->
                            </div><!-- col -->
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <style scope="scope">

            </style>
        </div>
    <?php endforeach; ?>
    <div class="gap-element" style="display:block; height:auto; padding-top:10px"
         class="clearfix"></div>
<?php endif; ?>