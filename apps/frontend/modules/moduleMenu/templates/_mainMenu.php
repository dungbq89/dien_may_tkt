<!-- Main Wrapper Start -->
<!--header area start-->
<header class="header_area">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="top_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="follow_us">
                            <label><?php echo __('Follow Us'); ?>:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->
    <!--header middel start-->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <a href="<?php echo url_for('homepage'); ?>"><img src="../images/logo.png" alt="" style="height: 60px;"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search-container">
                            <form action="<?php echo url_for1('@page_search') ?>" method="get">
                                <div class="search_box">
                                    <input placeholder="<?php echo __('Tìm kiếm'); ?> ..." type="search" name="keyword" id="keyword">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu header_position">
                        <nav>
                            <ul>

                                <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Trang chủ'); ?></a></li>
                                <li><a href="#"><?php echo __('Sản phẩm'); ?><i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <?php
                                        if (isset($data) && count($data)) {
                                            foreach ($data as $cate) {
                                                ?>
                                                <li><a href="<?php echo url_for('hq_product', array('slug' => $cate['slug'])); ?>"> <?php echo $cate['name']; ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>

                                <li><a href="#"><?php echo __('Dịch vụ'); ?><i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <?php
                                        if (isset($services) && count($services)) {
                                            foreach ($services as $service) {
                                                ?>
                                                <li><a href="<?php echo url_for('service', array('slug' => $service['slug'])); ?>"> <?php echo $service['name']; ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo url_for('policy'); ?>"><?php echo __('Chính sách'); ?></a></li>
                                <li><a href="<?php echo url_for1('@hq_news') ?>"><?php echo __('Tin tức'); ?></a></li>
                                <li><a href="<?php echo url_for('about_us'); ?>"><?php echo __('Giới thiệu'); ?></a></li>
                                <li><a href="<?php echo url_for('contact_us'); ?>"><?php echo __('Liên hệ'); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header bottom end-->

</header>
<!--header area end-->

<!--Offcanvas menu area start-->
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">

                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="Offcanvas_follow">
                        <label>Follow Us:</label>
                        <ul class="follow_link">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>

                    <div class="search-container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </div>
                        </form>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul>

                            <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Trang chủ'); ?></a></li>
                            <li><a href="#"><?php echo __('Sản phẩm'); ?></a>
                                <ul>
                                    <?php
                                    if (isset($data) && count($data)) {
                                        foreach ($data as $cate) {
                                            ?>
                                            <li><a href="<?php echo url_for('hq_product', array('slug' => $cate['slug'])); ?>"> <?php echo $cate['name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>

                            <li><a href="#"><?php echo __('Dịch vụ'); ?></a>
                                <ul>
                                    <?php
                                    if (isset($services) && count($services)) {
                                        foreach ($services as $service) {
                                            ?>
                                            <li><a href="<?php echo url_for('service', array('slug' => $service['slug'])); ?>"> <?php echo $service['name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo url_for('policy'); ?>"><?php echo __('Chính sách'); ?></a></li>
                            <li><a href="<?php echo url_for1('@hq_news') ?>"><?php echo __('Tin tức'); ?></a></li>
                            <li><a href="<?php echo url_for('about_us'); ?>"><?php echo __('Giới thiệu'); ?></a></li>
                            <li><a href="<?php echo url_for('contact_us'); ?>"><?php echo __('Liên hệ'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->
