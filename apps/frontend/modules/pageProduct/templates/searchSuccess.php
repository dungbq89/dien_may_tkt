<?php slot('slot_body') ?>
<body class="archive tax-product_cat term-laptop-dell-cu term-24 woocommerce woocommerce-page lightbox lazy-icons">
<?php end_slot(); ?>
<?php
$products = $pager->getResults();
$total = $pager->count();
?>
<div class="shop-page-title category-page-title page-title ">

    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-small">
                <nav class="woocommerce-breadcrumb breadcrumbs"><a href="<?php echo url_for1('@homepage') ?>">Trang
                        chủ</a> <span
                            class="divider">&#47;</span> Kết quả tìm kiếm cho "<?php echo $keyword ?>"
                </nav>
            </div>
            <div class="category-filtering category-filter-row ">
                <a href="#" data-open="#shop-sidebar" data-pos="left" class="filter-button uppercase plain">
                    <i class="icon-menu"></i>
                    <strong>Lọc</strong>
                </a>
                <div class="inline-block">
                    <?php if ($minPrice || $maxPrice): ?>
                        <div class="widget woocommerce widget_layered_nav_filters">
                            <ul>
                                <?php if ($minPrice): ?>
                                    <li class="chosen"><a aria-label="Xóa bộ lọc"
                                                          href="<?php echo url_for1(sprintf('@search_product?%s', VtHelper::getUrlCat($page, false, $maxPrice, $orderby, $keyword))) ?>"
                                                          class="tooltipstered">Min <span
                                                    class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($minPrice) ?><span
                                                        class="woocommerce-Price-currencySymbol">₫</span></span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($maxPrice): ?>
                                    <li class="chosen"><a aria-label="Xóa bộ lọc"
                                                          href="<?php echo url_for1(sprintf('@search_product?%s', VtHelper::getUrlCat($page, $minPrice, false, $orderby, $keyword))) ?>"
                                                          class="tooltipstered">Max <span
                                                    class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($maxPrice) ?><span
                                                        class="woocommerce-Price-currencySymbol">₫</span></span></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- .flex-left -->

        <div class="flex-col medium-text-center">

            <p class="woocommerce-result-count hide-for-medium">
                Showing <?php echo $start ?>&ndash;<?php echo ($end >= $total) ? $total : $end ?>
                of <?php echo $pager->count() ?> results</p>
            <form class="woocommerce-ordering" action="" method="get">
                <select name="orderby" class="orderby">
                    <option value="menu_order" selected='selected'>Thứ tự mặc định</option>
                    <!--                    <option value="popularity">Thứ tự theo mức độ phổ biến</option>-->
                    <!--                    <option value="rating">Thứ tự theo điểm đánh giá</option>-->
                    <!--                    <option value="date">Thứ tự theo sản phẩm mới</option>-->
                    <option value="price" <?php echo $orderby == 'price' ? 'selected' : '' ?>>Thứ tự theo giá: thấp đến
                        cao
                    </option>
                    <option value="price-desc" <?php echo $orderby == 'price-desc' ? 'selected' : '' ?>>Thứ tự theo giá:
                        cao xuống thấp
                    </option>
                </select>
                <?php if ($minPrice): ?>
                    <input type="hidden" name="min_price" value="" data-min="<?php echo $minPrice ? $minPrice : 0 ?>"
                           placeholder="Giá thấp nhất"/>
                <?php endif; ?>

                <?php if ($keyword): ?>
                    <input type="hidden" name="s" value="" data-min="<?php echo $keyword ? $keyword : '' ?>"
                           placeholder=""/>
                <?php endif; ?>

                <?php if ($maxPrice): ?>
                    <input type="hidden" name="max_price" value=""
                           data-max="<?php echo $maxPrice ? $maxPrice : 100000000 ?>"
                           placeholder="Giá cao nhất"/>
                <?php endif; ?>
            </form>
        </div><!-- .flex-right -->

    </div><!-- flex-row -->
</div><!-- .page-title -->

<main id="main" class="">
    <div class="row category-page-row">

        <div class="col large-12">
            <div class="shop-container">


                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-2-hover">

                    <?php if (count($products)): ?>
                        <?php foreach ($products as $pro): ?>
                            <?php
                            /** @var  $pro VtpProducts */
                            $arrCatInfo = json_decode($pro->cat_slug, true);
                            $aCat = $arrCatInfo[0];
                            $link = url_for1(sprintf('@productDetail?cat_slug=%s&slug=%s', $aCat['slug'], $pro->slug));
                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $pro->image_path;
                            $img = VtHelper::getThumbUrl($pathImg, 300, 300);
                            ?>
                            <div class="product-small col has-hover post-<?php echo $pro->id ?> product type-product status-publish has-post-thumbnail first instock sale shipping-taxable purchasable product-type-simple">
                                <div class="col-inner">
                                    <?php if ($pro->price_promotion): ?>
                                        <div class="badge-container absolute left top z-1">
                                            <div class="callout badge badge-square">
                                                <div class="badge-inner secondary on-sale"><span
                                                            class="onsale">-<?php echo sprintf('-%s', $pro->price_promotion) ?>%</span>
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
                                                                            class="woocommerce-Price-currencySymbol"><?php echo $pro->price ? '&#8363;' : '' ?></span></span></del> <ins><span
                                                                        class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($pro->price) ?><span
                                                                            class="woocommerce-Price-currencySymbol"><?php echo $pro->price ? '&#8363;' : '' ?></span></span></ins></span>
                                            </div>
                                        </div><!-- box-text -->
                                    </div><!-- box -->
                                </div><!-- .col-inner -->
                            </div><!-- col -->
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div><!-- row -->
                <?php if ($pager && $pager->haveToPaginate()): ?>
                    <div class="container">
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers nav-pagination links text-center">
                                <?php if ($pager->getPage() >= 2): ?>
                                    <li><a class="prev page-number"
                                           href="<?php echo url_for1(sprintf('@search_product?%s', VtHelper::getUrlCat(false, false, $maxPrice, $orderby, $keyword))) ?>"><i
                                                    class="icon-angle-left"></i></a></li>
                                <?php endif; ?>
                                <?php foreach ($pager->getLinks() as $pg): ?>
                                    <?php if ($pg == $pager->getPage()): ?>
                                        <li><span aria-current="page"
                                                  class="page-number current"><?php echo $pager->getPage() ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li><a class="page-number"
                                               href="<?php echo url_for1(sprintf('@search_product?%s', VtHelper::getUrlCat($pg, false, $maxPrice, $orderby, $keyword))) ?>"><?php echo $pg ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($pager->getPage() < $pager->getLastPage()): ?>
                                    <li><a class="next page-number"
                                           href="<?php echo url_for1(sprintf('@search_product?%s', VtHelper::getUrlCat($pager->getLastPage(), false, $maxPrice, $orderby, $keyword))) ?>"><i
                                                    class="icon-angle-right"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>

            </div><!-- shop container -->
        </div><!-- col-fit  -->

        <div id="shop-sidebar" class="mfp-hide">
            <div class="sidebar-inner">
                <aside id="text-2" class="widget widget_text">
                    <div class="textwidget"><p>Webdesign chỉ cung cấp hàng hóa chính hãng, sản phẩm chất lượng và chế độ
                            bảo
                            hành tốt nhất!</p>
                        <p>Mọi chi tiết, xin liên hệ: 0909.009.009</p>
                    </div>
                </aside>
                <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><span
                            class="widget-title shop-sidebar">Lọc theo giá</span>
                    <div class="is-divider small"></div>
                    <form method="get"
                          action="<?php echo url_for1(sprintf('@search_product?%s', VtHelper::getUrlCat($pager->getLastPage(), false, $maxPrice, $orderby, $keyword))) ?>">
                        <div class="price_slider_wrapper">
                            <div class="price_slider" style="display:none;"></div>
                            <div class="price_slider_amount">
                                <input type="text" id="min_price" name="min_price"
                                       value="<?php echo $minPrice ? $minPrice : 0 ?>"
                                       data-min="<?php echo 0 ?>"
                                       placeholder="Giá thấp nhất"/>
                                <input type="text" id="max_price" name="max_price"
                                       value="<?php echo $maxPrice ? $maxPrice : 100000000 ?>"
                                       data-max="<?php echo 100000000 ?>"
                                       placeholder="Giá cao nhất"/>
                                <?php if ($orderby): ?>
                                    <input type="hidden" name="orderby" value="<?php echo $orderby ? $orderby : '' ?>">
                                <?php endif; ?>

                                <?php if ($keyword): ?>
                                    <input type="hidden" name="s" value=""
                                           data-min="<?php echo $keyword ? $keyword : '' ?>" placeholder=""/>
                                <?php endif; ?>

                                <button type="submit" class="button">Lọc</button>
                                <div class="price_label" style="display:none;">
                                    Giá <span class="from"></span> &mdash; <span class="to"></span>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </form>
                </aside>

                <?php include_component('pageProduct', 'navCat'); ?>
            </div><!-- .sidebar-inner -->
        </div><!-- large-3 -->
    </div>

</main><!-- #main -->
<?php slot('js_price'); ?>

<script type='text/javascript'>
    /* <![CDATA[ */
    var woocommerce_price_slider_params = {
        "min_price": "<?php echo $minPrice ?>",
        "max_price": "<?php echo $maxPrice ?>",
        "currency_format_num_decimals": "0",
        "currency_format_symbol": "\u20ab",
        "currency_format_decimal_sep": ".",
        "currency_format_thousand_sep": ".",
        "currency_format": "%v%s"
    };
    /* ]]> */
</script>
<?php end_slot(); ?>
