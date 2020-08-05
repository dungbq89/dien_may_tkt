<?php
/** @var $product VtpProducts */
/** @var $pro VtpProducts */
$attrs = $product->getAttrByProductId();
$listImage = $product->getListImage();
$arrCatSlug = json_decode($product->cat_slug, true);
$pathImgProduct = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;

?>
<?php slot('slot_body') ?>
<body class="product-template-default single single-product postid-1618 woocommerce woocommerce-page lightbox lazy-icons">
<?php end_slot(); ?>

<main id="main" class="">

    <div class="shop-container">

        <div class="container">
            <div class="category-filtering container text-center product-filter-row show-for-medium">
                <a href="#product-sidebar"
                   data-open="#product-sidebar"
                   data-pos="left"
                   class="filter-button uppercase plain">
                    <i class="icon-menu"></i>
                    <strong>Lọc</strong>
                </a>
            </div>
        </div><!-- /.container -->
        <div id="product-1618"
             class="post-1618 product type-product status-publish has-post-thumbnail product_cat-laptop-dell-cu product_cat-laptop-sinh-vien-van-phong first instock sale shipping-taxable purchasable product-type-simple">
            <div class="product-main">
                <div class="row content-row row-divided row-large">

                    <?php include_component('pageProduct', 'navProductRg'); ?>

                    <div class="col large-9">
                        <div class="row">
                            <div class="large-5 col">

                                <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                     data-columns="4">

                                    <!--                                    <div class="badge-container is-larger absolute left top z-1">-->
                                    <!--                                        <div class="callout badge badge-square">-->
                                    <!--                                            <div class="badge-inner secondary on-sale"><span-->
                                    <!--                                                        class="onsale">-17%</span></div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <div class="image-tools absolute top show-on-hover right z-3">
                                    </div>

                                    <figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half has-image-zoom"
                                            data-flickity-options='{
                "cellAlign": "center",
                "wrapAround": true,
                "autoPlay": false,
                "prevNextButtons":true,
                "adaptiveHeight": true,
                "imagesLoaded": true,
                "lazyLoad": 1,
                "dragThreshold" : 15,
                "pageDots": false,
                "rightToLeft": false       }'>
                                        <?php if ($listImage): ?>
                                            <?php foreach ($listImage as $k => $image): ?>
                                                <?php
                                                $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $image['file_path'];
                                                $img300 = VtHelper::getThumbUrl($pathImg, 332, 443);
                                                ?>
                                                <div data-thumb="<?php echo $pathImg ?>"
                                                     class="woocommerce-product-gallery__image slide <?php echo $k == '0' ? 'first' : '' ?>">
                                                    <a
                                                            href="<?php echo $pathImg ?>"><img
                                                                width="960" height="1280"
                                                                src="<?php echo $pathImg ?>"
                                                                class="wp-post-image"
                                                                alt="<?php echo $product->product_name ?>"
                                                                title="<?php echo $product->product_name ?>"
                                                                data-caption=""
                                                                data-src="<?php echo $pathImg ?>"
                                                                data-large_image="<?php echo $pathImg ?>"
                                                                data-large_image_width="960"
                                                                data-large_image_height="1280"
                                                                srcset="<?php echo $pathImg ?> 960w, <?php echo $pathImg ?> 225w"
                                                                sizes="(max-width: 960px) 100vw, 960px"/></a></div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
<?php
                                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;
                                            $img300 = VtHelper::getThumbUrl($pathImg, 300, 300);
                                            ?>
                                            <div data-thumb="<?php echo $img300 ?>"
                                                 class="woocommerce-product-gallery__image slide first">
                                                <a
                                                        href="<?php echo $pathImg ?>"><img
                                                            width="960" height="1280"
                                                            src="<?php echo $pathImg ?>"
                                                            class="wp-post-image"
                                                            alt="<?php echo $product->product_name ?>"
                                                            title="<?php echo $product->product_name ?>"
                                                            data-caption=""
                                                            data-src="<?php echo $pathImg ?>"
                                                            data-large_image="<?php echo $pathImg ?>"
                                                            data-large_image_width="960"
                                                            data-large_image_height="1280"
                                                            srcset="<?php echo $pathImg ?> 960w, <?php echo $img300 ?> 225w"
                                                            sizes="(max-width: 960px) 100vw, 960px"/></a></div>
                                        <?php endif; ?>

                                    </figure>

                                    <div class="image-tools absolute bottom left z-3">
                                        <a href="#product-zoom"
                                           class="zoom-button button is-outline circle icon tooltip hide-for-small"
                                           title="Zoom">
                                            <i class="icon-expand"></i> </a>
                                    </div>
                                </div>

                                <div class="product-thumbnails thumbnails slider-no-arrows slider row row-small row-slider slider-nav-small small-columns-4"
                                     data-flickity-options='{
              "cellAlign": "left",
              "wrapAround": false,
              "autoPlay": false,
              "prevNextButtons": true,
              "asNavFor": ".product-gallery-slider",
              "percentPosition": true,
              "imagesLoaded": true,
              "pageDots": false,
              "rightToLeft": false,
              "contain": true
          }'
                                >
                                    <?php if ($listImage): ?>
                                        <?php foreach ($listImage as $k => $image): ?>
                                            <?php
                                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $image['file_path'];
                                            $img300 = VtHelper::getThumbUrl($pathImg, 332, 443);
                                            ?>
                                            <div class="col <?php echo $k == '0' ? 'is-nav-selected first' : '' ?>">
                                                <a>
                                                    <img src="<?php echo $img300 ?>"
                                                         width="300" height="300"
                                                         class="attachment-woocommerce_thumbnail"/>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <?php
                                        $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $product->image_path;
                                        $img300 = VtHelper::getThumbUrl($pathImg, 300, 300);
                                        ?>
                                        <div class="col is-nav-selected first">
                                            <a>
                                                <img src="<?php echo $img300 ?>"
                                                     width="300" height="300"
                                                     class="attachment-woocommerce_thumbnail"/>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                </div><!-- .product-thumbnails -->

                            </div>


                            <div class="product-info summary entry-summary col col-fit product-summary form-flat">
                                <nav class="woocommerce-breadcrumb breadcrumbs">
                                    <a href="<?php echo url_for1('@homepage') ?>">Trang
                                        chủ</a> <span class="divider">&#47;</span> <a
                                            href="<?php echo url_for1(sprintf('@cat_product?slug=%s', $cat->slug)) ?>"><?php echo $cat->name ?></a>
                                </nav>
                                <h1 class="product-title entry-title">
                                    <?php echo $product->product_name ?>
                                </h1>

                                <div class="is-divider small"></div>
                                <div class="price-wrapper">
                                    <p class="price product-page-price price-on-sale">

                                        <ins><span class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($product->price) ?>
                                                <?php if ($product->price): ?>
                                                    <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                <?php endif; ?>
                                            </span>
                                        </ins>
                                    </p>
                                </div>
                                <div class="product-short-description">
                                    <?php echo VtHelper::strip_html_tags_and_decode_puri($product->description) ?>
                                </div>
                                <?php if ($attrs): ?>
                                    <div class="khuyen-mai"><h4>Khuyến mãi hot nhất:</h4>
                                        <?php foreach ($attrs as $attr): ?>
                                            <li><span class="fa fa-gift"
                                                      aria-hidden="true"></span><span><?php echo $attr->name ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mua-hang-button">
                                    <div class="row row-small form-lien-he" id="row-257114549">

                                        <div class="col medium-6 small-12 large-6">
                                            <div class="col-inner">

                                                <a rel="noopener noreferrer" href="tel:+84929191001" target="_blank"
                                                   class="button secondary expand" style="border-radius:5px;">
                                                    <i class="icon-checkmark"></i>
                                                    <span>HOTLINE: 092.91.91.001</span>
                                                </a>


                                            </div>
                                        </div>
                                        <div class="col medium-6 small-12 large-6">
                                            <div class="col-inner">

                                                <a rel="noopener noreferrer"
                                                   href="https://www.messenger.com/t/CuaHangLaptop.91"
                                                   target="_blank" class="button success expand"
                                                   style="border-radius:5px;">
                                                    <i class="icon-facebook"></i> <span>chat facebook</span>
                                                </a>


                                            </div>
                                        </div>


                                        <style scope="scope">

                                        </style>
                                    </div>
                                </div>
                                <div class='clearfix'></div>
                                <a data-popup-open='muahangnhanh' href='#'>
                                    <div class='detailcall-1'><h3>ĐẶT HÀNG NHANH</h3><span>Giao hàng tận nơi miễn phí nội thành!</span>
                                    </div>
                                </a>
                                <div class='popup' data-popup='muahangnhanh'>
                                    <div class='popup-inner'>
                                        <div id='contact_form_pop'>
                                            <div class='form-title'>
                                                <h3>Đặt hàng nhanh</h3>
                                                <p>Hoặc gọi trực tiếp 0972.939.830 (MR.Thiện) để được tư vấn chính
                                                    xác nhất!</p>
                                                <hr>
                                            </div>
                                            <div class='form-content'>
                                                <div class='cottrai'>
                                                    <img src="<?php echo $pathImgProduct ?>">
                                                    <div class='title-wrapper'>
                                                        <?php echo $product->product_name ?>
                                                    </div>
                                                    <ins><span class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($product->price) ?>
                                                            <?php if ($product->price): ?>
                                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                            <?php endif; ?>
                                            </span>
                                                    </ins>

                                                    <p style='margin-top:10px; font-size:14px; color: black; padding: 0;'>
                                                        Bạn vui lòng nhập đúng thông tin đặt hàng gồm: Họ tên, SĐT,
                                                        Email, Địa chỉ để chúng tôi được phục vụ bạn tốt nhất !</p>
                                                </div>
                                                <div class='cotphai'>
                                                    <div class='form-group'>
                                                        <input type='text' class='form-control'
                                                               placeholder='Họ tên:' name='name' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='text' class='form-control'
                                                               placeholder='Số điện thoại:' name='sdt' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='email' class='form-control'
                                                               placeholder='Email của bạn:' name='email' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='text' class='form-control'
                                                               placeholder='Địa chỉ nhận hàng:' name='address'
                                                               required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='number' class='form-control'
                                                               placeholder='Số lượng mua hàng' name='qty' value=''
                                                               required min='1'>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='text' class='form-control' disabled
                                                               name='total' required>
                                                    </div>
                                                    <button type='submit' class='btn btn-default' name='submit'>ĐẶT
                                                        HÀNG
                                                    </button>
                                                    <div class='web79loading' style='display:inline-block'></div>

                                                </div>
                                            </div>
                                        </div>
                                        <a class='popup-close' data-popup-close='muahangnhanh' href='#'>x</a>
                                    </div>
                                </div>

                                <script>var price = '<?php VtHelper::getProductPrice($product->price) ?>';
                                    var from = 'laptopductminh';
                                    var blog_url = '<?php echo url_for1("@homepage") ?>';
                                    var to = 'doivodesign@gmail.com'; </script>
                                <?php if (!empty($arrCatSlug)): ?>
                                    <div class="product_meta">
                                        <span class="posted_in">Danh mục:
                                            <?php
                                            $_arrCat = [];
                                            foreach ($arrCatSlug as $_cat) {
                                                $_arrCat[] = sprintf('<a href="%s" rel="tag">%s</a>', url_for1(sprintf('@cat_product?slug=%s', $_cat['slug'])), $_cat['title']);
                                            }
                                            echo implode(',', $_arrCat);
                                            ?>

                                        </span>


                                    </div>
                                <?php endif; ?>
                                <div class="social-icons share-icons share-row relative icon-style-outline "><a
                                            href="whatsapp://send?text=Dell%203568%20i5%207200%20ram%208gb%20ssssd%20128gb%20%2Bhdd%201tb%20v%E1%BB%ABa%20r%E1%BB%9Di%202gb%20m%E1%BA%A5y%20nh%C6%B0%20%C4%91%E1%BA%ADp%20h%E1%BB%99p.%C2%A0 - https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/"
                                            data-action="share/whatsapp/share"
                                            class="icon button circle is-outline tooltip whatsapp show-for-medium"
                                            title="Share on WhatsApp"><i class="icon-phone"></i></a><a
                                            href="//www.facebook.com/sharer.php?u=https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/"
                                            data-label="Facebook"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip facebook"
                                            title="Share on Facebook"><i class="icon-facebook"></i></a><a
                                            href="//twitter.com/share?url=https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip twitter"
                                            title="Share on Twitter"><i class="icon-twitter"></i></a><a
                                            href="mailto:enteryour@addresshere.com?subject=Dell%203568%20i5%207200%20ram%208gb%20ssssd%20128gb%20%2Bhdd%201tb%20v%E1%BB%ABa%20r%E1%BB%9Di%202gb%20m%E1%BA%A5y%20nh%C6%B0%20%C4%91%E1%BA%ADp%20h%E1%BB%99p.%C2%A0&amp;body=Check%20this%20out:%20https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/"
                                            rel="nofollow" class="icon button circle is-outline tooltip email"
                                            title="Email to a Friend"><i class="icon-envelop"></i></a><a
                                            href="//pinterest.com/pin/create/button/?url=https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/&amp;media=https://laptop91.com/wp-content/uploads/2020/07/z1985308445880_91120cbdb752ff6d04d860b03595d311-768x1024.jpg&amp;description=Dell%203568%20i5%207200%20ram%208gb%20ssssd%20128gb%20%2Bhdd%201tb%20v%E1%BB%ABa%20r%E1%BB%9Di%202gb%20m%E1%BA%A5y%20nh%C6%B0%20%C4%91%E1%BA%ADp%20h%E1%BB%99p.%C2%A0"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip pinterest"
                                            title="Pin on Pinterest"><i class="icon-pinterest"></i></a><a
                                            href="//plus.google.com/share?url=https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/"
                                            target="_blank" class="icon button circle is-outline tooltip google-plus"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" title="Share on Google+"><i
                                                class="icon-google-plus"></i></a><a
                                            href="//www.linkedin.com/shareArticle?mini=true&url=https://laptop91.com/sản phẩm/dell-3568-i5-7200-ram-8gb-ssssd-128gb-hdd-1tb-vua-roi-2gb-may-nhu-dap-hop/&title=Dell%203568%20i5%207200%20ram%208gb%20ssssd%20128gb%20%2Bhdd%201tb%20v%E1%BB%ABa%20r%E1%BB%9Di%202gb%20m%E1%BA%A5y%20nh%C6%B0%20%C4%91%E1%BA%ADp%20h%E1%BB%99p.%C2%A0"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip linkedin"
                                            title="Share on LinkedIn"><i class="icon-linkedin"></i></a></div>
                            </div><!-- .summary -->


                        </div><!-- .row -->
                        <div class="product-footer">

                            <div class="woocommerce-tabs container tabbed-content">
                                <ul class="product-tabs  nav small-nav-collapse tabs nav nav-uppercase nav-line nav-left">
                                    <li class="description_tab  active">
                                        <a href="#tab-description">Mô tả</a>
                                    </li>
                                    <li class="ux_global_tab_tab  ">
                                        <a href="#tab-ux_global_tab">Thông tin liên hệ</a>
                                    </li>
                                </ul>
                                <div class="tab-panels">

                                    <div class="panel entry-content active" id="tab-description">
                                        <?php echo VtHelper::strip_html_tags_and_decode_puri($product->content) ?>
                                    </div>





                                    <div class="panel entry-content " id="tab-ux_global_tab">
                                        <b>Liên hệ:</b> Laptop91<br>
                                        <b>Số điện thoại:</b>092.91.91.001<br>
                                        <b>Email:</b> cuahanglaptop91@gmail.com<br>
                                        <b>Website:</b> <a href="http://laptop91.com">laptop91.com</a>
                                        <Br><br>
                                        <b>THÔNG TIN THANH TOÁN</b><br>
                                        <b>1. Ngân hàng Techcombank</b><br>
                                        - Số tài khoản: 19032742403017<br>
                                        - Tên tài khoản: LeTrongNghia<br>
                                        - Chi nhánh: TCB Chi nhánh Hà Tây<br>
                                        <b>2. Ngân hàng TPBank</b><br>
                                        - Số tài khoản: 03344570901<br>
                                        - Tên tài khoản: LeTrongNghia<br>
                                        - Chi nhánh: TPbank Chi nhánh Hà Nội<br>
                                        <b>3. Ngân hàng MB</b><br>
                                        - Số tài khoản: 8210111689001<br>
                                        - Tên tài khoản: LeTrongNghia<br>
                                        - Chi nhánh: MB Chi nhánh Hà Nội
                                    </div>

                                </div><!-- .tab-panels -->
                            </div><!-- .tabbed-content -->

                            <?php if ($productRelated): ?>
                                <div class="related related-products-wrapper product-section">

                                    <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                        Related products </h3>


                                    <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"
                                         data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                        <?php foreach ($productRelated as $pro): ?>
                                            <?php
//    $arrCatInfo = json_decode($pro->cat_slug, true);
                                            $link = url_for1(sprintf('@productDetail?cat_slug=%s&slug=%s', $cat->slug, $pro->slug));
                                            $pathImg = '/uploads/' . sfConfig::get('app_product_images') . $pro->image_path;
                                            $img = VtHelper::getThumbUrl($pathImg, 300, 300);

                                            ?>
                                            <div class="product-small col has-hover post-1439 product type-product status-publish has-post-thumbnail product_cat-laptop-dell-cu product_cat-laptop-sinh-vien-van-phong first instock shipping-taxable purchasable product-type-simple">
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
                                                                         sizes="(max-width: 300px) 100vw"/> </a>
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
                                                            <span class="price"><span
                                                                        class="woocommerce-Price-amount amount"><?php echo VtHelper::getProductPrice($pro->price) ?>
                                                                    <?php if ($pro->price): ?>  <span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span> <?php endif; ?>
                                                                </span></span>
                                                            </div>
                                                        </div><!-- box-text -->
                                                    </div><!-- box -->
                                                </div><!-- .col-inner -->
                                            </div><!-- col -->
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div><!-- col large-9 -->

                </div><!-- .row -->
            </div><!-- .product-main -->
        </div>


    </div><!-- shop container -->

</main><!-- #main -->
