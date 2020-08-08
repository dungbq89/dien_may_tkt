<?php
$news = $pager->getResults();
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo url_for1('homepage') ?>"><?php echo __('home') ?></a></li>
                        <li><?php echo __('News') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog area start-->
<div class="blog_page_section mt-23">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog_wrapper">
                    <?php
                    if ($pager->count() > 0) {
                        foreach ($news as $new) {
                            $pathImg = '/uploads/' . sfConfig::get('app_article_images') . $new->image_path;
                            ?>
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a href="<?php echo url_for1('@hq_new_detail?slug=' . $new->slug) ?>">
                                        <img src="<?php echo VtHelper::getThumbUrl($pathImg, 356, 245) ?>" alt=""></a>
                                </div>
                                <div class="blog_content">
                                    <h3><a href="<?php echo url_for1('@hq_new_detail?slug=' . $new->slug) ?>">
                                            <?php echo $new->title ?>
                                        </a></h3>

                                    <div class="blog_meta">
                                        <span class="post_date"><i class="fa-calendar fa"></i>
                                            <?php echo date('Y-m-d', strtotime($new->published_time)) ?>
                                        </span>
                                        <!--                                        <span class="author"><i class="fa fa-user-circle"></i> Posts by : admin</span>-->
                                        <!--                                    <span class="category">-->
                                        <!--                                        <i class="fa fa-folder-open"></i>-->
                                        <!--                                        <a href="#">Fashion</a>-->
                                        <!--                                    </span>-->
                                    </div>
                                    <div class="blog_desc">
                                        <p>
                                            <?php echo $new->header ?>
                                        </p>
                                    </div>
                                    <div class="readmore_button">
                                        <a href="<?php echo url_for1('@hq_new_detail?slug=' . $new->slug) ?>">
                                            <?php echo __('read more') ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--blog area end-->

<!--blog pagination area start-->
<?php if ($pager && $pager->haveToPaginate()){ ?>
<div class="blog_pagination">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pagination">
                    <ul>
                        <?php if ($pager->getPage() >= 2): ?>
                            <li><a href="<?php echo url_for1('@hq_news') ?>">
                                    <i class="fa fa-angle-left"></i></a></li>
                        <?php endif; ?>
                        <?php foreach ($pager->getLinks() as $page): ?>
                            <li class="<?php echo $page == $pager->getPage() ? 'current' : '' ?>">
                                <a href="<?php echo url_for1('@hq_news?page=' . $page) ?>">
                                    <?php echo $page ?></a></li>
                        <?php endforeach; ?>
                        <?php if ($pager->getPage() < $pager->getLastPage()): ?>
                            <li>
                                <a href="<?php echo url_for1('@hq_news?page=' . $pager->getLastPage()) ?>"><i
                                        class="fa fa-angle-right"></i></a></li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--blog pagination area end-->

<!--slider area end-->

<!-- modal area end-->
