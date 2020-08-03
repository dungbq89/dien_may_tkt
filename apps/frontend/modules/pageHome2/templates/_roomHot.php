<div class="grid grid-pad">
    <div class="c20"></div>

    <h2 class="title-cat-home" style="text-transform:uppercase"><?php echo __('Phòng nổi bật'); ?></h2>

    <div class="c20 hide-on-mobile"></div>
    <?php
    if (isset($products) && count($products)) {
        foreach ($products as $product) {
            $path = '/uploads/' . sfConfig::get('app_product_images') . $product['image_path'];
            ?>
            <div class="col-1-4 pad-col-1-3 tab-col-1-2 ">
                <div class="">
                    <div class="image-apart">
                        <div class=""></div>
                        <a href="<?php echo url_for1('@room_detail?slug=' . $product['slug']) ?>"><img
                                    src="<?php echo VtHelper::getThumbUrl($path, 420, 315, 'default') ?>"
                                    alt="<?php echo htmlspecialchars($product['product_name']) ?>"
                                    width="100%"></a>
                    </div>
                    <h2 class="pro-name"><a
                                href="<?php echo url_for1('@room_detail?slug=' . $product['slug']) ?>"><?php echo htmlspecialchars($product['product_name']) ?></a>
                    </h2>

                    <div class="info-apart"><?php echo VtHelper::truncate($product['description'], 100, '...'); ?>
                        <div class="c10"></div>
                    </div>
                    <div class="c10"></div>
                    <div class="price-book">
            	<span class="col-2-3">
                    <div class="price"><span><?php echo number_format($product['price_promotion'], 0, '', '.') ?>
                            &nbsp;<?php echo __('vnđ') ?></span>/<?php echo __('ngày') ?></div>
                	<div class="price"><span><?php echo number_format($product['price'], 0, '', '.') ?>
                            &nbsp;<?php echo __('vnđ') ?></span>/<?php echo __('tháng') ?></div>

                </span>

                        <div class="c10 mobile-break"></div>
                        <span class="col-1-3" style="padding:0px;">
                	<a href="<?php echo url_for1('@booking?id=' . $product['id']) ?>" class="quick-book">Book <i
                                class="fa fa-chevron-right"
                                aria-hidden="true"></i></a>
                </span>

                        <div class="c"></div>
                    </div>
                </div>
                <div class="c20 mobile-break"></div>
            </div>
            <?php
        }
    }
    ?>
    <div class="c30"></div>
</div>
<div class="c5"></div>