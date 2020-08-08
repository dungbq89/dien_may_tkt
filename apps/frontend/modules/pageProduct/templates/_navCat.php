<?php if (count($mainMenu)): ?>
    <aside id="nav_menu-2" class="widget widget_nav_menu">
        <div class="menu-danh-muc-san-pham-container">
            <ul id="menu-danh-muc-san-pham-1" class="menu">
                <?php foreach ($mainMenu as $idx => $mm): ?>
                    <!--                    current-menu-item-->
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1122">
                        <a href="<?php echo VtHelper::getLinkMM($mm['link']) ?>"><?php echo $mm['name'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </aside>
<?php endif; ?>
<?php if (count($products)): ?>
    <aside id="woocommerce_products-4" class="widget woocommerce widget_products">
                <span
                        class="widget-title shop-sidebar">Sản phẩm mới nhất</span>
        <div class="is-divider small"></div>
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
                         src="//laptop91.com/wp-content/themes/flatsome/assets/img/lazy.png"
                         data-src="<?php echo $img ?>"
                         class="lazy-load attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                         alt="<?php echo $pro->product_name ?>" srcset=""
                         data-srcset="<?php echo $img ?> 180w, <?php echo $img ?> 150w, <?php echo $img ?> 300w, <?php echo $img ?> 600w"
                         sizes="(max-width: 180px) 100vw, 180px"/> <span class="product-title"><?php echo $pro->product_name ?></span>
                </a>

                <ins><span class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($pro->price) ?><?php if ($pro->price): ?>
                            <span
                                    class="woocommerce-Price-currencySymbol">&#8363;</span> <?php endif; ?></span>
                </ins>

            </li>
            <?php endforeach; ?>
        </ul>
    </aside>
<?php endif; ?>
