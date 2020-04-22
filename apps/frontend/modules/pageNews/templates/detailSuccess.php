<?php
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo url_for1('homepage') ?>"><?php echo __('home') ?></a></li>
                        <li><a href="<?php echo url_for1('hq_news') ?>"><?php echo __('News') ?></a></li>
                        <li><?php echo htmlentities($new->title) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog body area start-->
<div class="blog_details blog_padding mt-23">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_details_wrapper">
                    <!--                    <div class="blog_thumb">-->
                    <!--                        <a href="#"><img src="assets/img/blog/blog-big1.jpg" alt=""></a>-->
                    <!--                    </div>-->
                    <div class="blog_content">
                        <h3 class="post_title"><?php echo htmlentities($new->title) ?></h3>

                        <div class="post_meta">
                            <!--                            <span><i class="ion-person"></i> Posted by </span>-->
                            <!--                            <span><a href="#">admin</a></span>-->
                            <!--                            <span>|</span>-->
                            <span><i class="fa fa-calendar"
                                     aria-hidden="true"></i>  Posted on <?php echo date('Y-m-d', strtotime($new->published_time)) ?>	</span>

                        </div>
                        <div class="post_content">

                            <?php echo $new->body ?>
                        </div>

                    </div>

                </div>
                <!--blog grid area start-->
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_search">
                        <h3><?php echo __('Search') ?></h3>

                        <form action="<?php echo url_for1('@hq_news_search') ?>">
                            <input placeholder="<?php echo __('Search') ?>..." type="text" name="q">
                            <button type="submit"><?php echo __('Search') ?></button>
                        </form>
                    </div>
                    <?php include_component('pageNews', 'hotNew', array('id'=>$new->id)) ?>

                    <!--                    <div class="widget_list widget_categories">-->
                    <!--                        <h3>Categories</h3>-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="#">Fashion</a></li>-->
                    <!--                            <li><a href="#">Travel</a></li>-->
                    <!--                            <li><a href="#">Videos</a></li>-->
                    <!--                            <li><a href="#">WordPress</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog section area end-->

