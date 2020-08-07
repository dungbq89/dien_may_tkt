<?php /** @var $pro VtpProducts */ ?>
<?php /** @var $new AdArticle */ ?>
<div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">
    <aside id="woocommerce_products-2" class="widget woocommerce widget_products"><span
                class="widget-title shop-sidebar">Sản phẩm</span>
        <div class="is-divider small"></div>
        <?php if (count($products)): ?>
            <ul class="product_list_widget">
                <?php foreach ($products as $pro): ?>
                    <?php
                    $link = url_for1(sprintf('@productDetail?cat_slug=%s&slug=%s', $catSlug, $pro->slug));
                    $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $pro->image_path;
                    $img = VtHelper::getThumbUrl($pathImg, 180, 180);
                    ?>
                    <li>
                        <a href="<?php echo $link ?>">
                            <img width="180" height="180"
                                 src="<?php echo sfConfig::get('app_img_lazy') ?>"
                                 data-src="<?php echo $img ?>"
                                 class="lazy-load attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                 alt="<?php echo $pro->product_name ?>" srcset=""
                                 data-srcset="<?php echo $img ?> 180w, <?php echo $img ?> 150w, <?php echo $img ?> 300w"
                                 sizes="(max-width: 180px) 100vw, 180px"/> <span class="product-title">
                        <?php echo $pro->product_name ?>
                    </span>
                        </a>
                        <ins><span class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($pro->price) ?><?php if ($pro->price): ?>
                                    <span
                                            class="woocommerce-Price-currencySymbol">&#8363;</span> <?php endif; ?></span>
                        </ins>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </aside>
    <?php if (count($articles)): ?>
        <aside id="flatsome_recent_posts-2" class="widget flatsome_recent_posts"><span
                    class="widget-title shop-sidebar">Bài viết &#8211; tin tức</span>
            <div class="is-divider small"></div>
            <ul>
                <?php foreach ($articles as $new): ?>
                    <?php
                    $arrCatInfo = json_decode($new->cat_slug, true);
                    $catInfo = $arrCatInfo[0];
                    $link = url_for1(sprintf('@newDetail?cat_slug=%s&slug=%s', $catInfo['slug'], $new->slug));
                    $pathImg = '/uploads/' . sfConfig::get('app_article_images') . $new->image_path;
                    $img = VtHelper::getThumbUrl($pathImg, 92, 60);
                    ?>
                    <li class="recent-blog-posts-li">
                        <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                            <div class="flex-col mr-half">
                                <div class="badge post-date  badge-square">
                                    <div class="badge-inner bg-fill"
                                         style="background: url(<?php echo $img ?>); border:0;">
                                    </div>
                                </div>
                            </div><!-- .flex-col -->
                            <div class="flex-col flex-grow">
                                <a href="<?php echo $link ?>"
                                   title="<?php echo $new->title ?>">
                                    <?php echo $new->title ?>
                                </a>
                                <span class="post_comments op-7 block is-xsmall"><a
                                            href="<?php echo $link ?>"></a></span>
                            </div>
                        </div><!-- .flex-row -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>
    <?php endif; ?>
</div><!-- col large-3 -->
