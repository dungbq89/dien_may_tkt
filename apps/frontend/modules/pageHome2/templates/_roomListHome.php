<div class="col-3-4 mobile-col-1-1 tab-col-1-1 chain-home-list" style="">
    <h1 class="title-first-home"><span><a href="javascript:void(0);"><?php echo __('Phòng được thuê nhiều'); ?></a></span></h1>

    <div class="c20"></div>
    <div style="position:relative">

        <div class="swiper-container chain-slide">
            <div class="swiper-wrapper">
                <?php
                if (isset($products) && count($products)) {
                    foreach ($products as $product) {
                        $path = '/uploads/' . sfConfig::get('app_product_images') . $product['image_path'];
                        ?>
                        <div class="swiper-slide">
                            <div><a href="<?php echo url_for1('@room_detail?slug=' . $product['slug']) ?>"><img
                                            src="<?php echo VtHelper::getThumbUrl($path, 420, 315, 'default') ?>"
                                            alt="<?php echo htmlspecialchars($product['product_name']) ?>" width="100%"></a>
                            </div>
                            <div class="pro-home-name"><a
                                        href="<?php echo url_for1('@room_detail?slug=' . $product['slug']) ?>"><?php echo htmlspecialchars($product['product_name']) ?></a>
                            </div>
                            <div class="chain-info">
                                <div class="price-book">
                                    <span class="col-2-3">
                                        <div class="price"><span><?php echo number_format($product['price_promotion'], 0, '', '.') ?>
                                                &nbsp;<?php echo __('vnđ') ?></span>/<?php echo __('ngày') ?></div>
                                        <div class="price"><span><?php echo number_format($product['price'], 0, '', '.') ?>
                                                &nbsp;<?php echo __('vnđ') ?></span>/<?php echo __('tháng') ?></div>

                                    </span>
<!--                                    <div class="c10 mobile-break"></div>-->
                                    <span class="col-1-3" style="padding:0px;">
                                        <a href="<?php echo url_for1('@booking?id='.$product['id']) ?>" class="quick-book"
                                           style="color: #fff;"><?php echo __('Book') ?> <i
                                                    class="fa fa-chevron-right"
                                                    aria-hidden="true"></i></a>
                                    </span>

                                    <div class="c"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="swiper-chain-next hide-on-tab hide-on-mobile hide-on-pad"><i class="fa fa-angle-right"></i></div>
        <div class="swiper-chain-prev  hide-on-tab hide-on-mobile hide-on-pad"><i class="fa fa-angle-left"
                                                                                  aria-hidden="true"></i>
        </div>
    </div>
    <script>
        var xview = 3;
        if ($(document).width() <= 980) {
            xview = 2;

        }
        if ($(document).width() <= 768) {
            xview = 2;

        }

        if ($(document).width() <= 480) {
            xview = 1;

        }
        if ($(document).width() <= 320) {
            xview = 1;


        }
        var swiper = new Swiper('.chain-slide', {
            pagination: '',
            slidesPerView: xview,
            paginationClickable: true,
            spaceBetween: 30,
            autoplay: 3000,
            speed: 1000,
            simulateTouch: false,
            nextButton: '.swiper-chain-next',
            prevButton: '.swiper-chain-prev',
        });
    </script>
</div>
<div class="c30"></div>