<div class="widget_list widget_post">
    <h3>Recent Posts</h3>
    <?php
    if ($hotnew) {
        foreach ($hotnew as $new) {
            $pathImg = '/uploads/' . sfConfig::get('app_article_images') . $new->image_path;
            ?>
            <div class="post_wrapper">
                <div class="post_thumb">
                    <a href="<?php echo url_for1('@hq_new_detail?slug=' . $new->slug) ?>">
                        <img src="<?php echo VtHelper::getThumbUrl($pathImg, 55, 55) ?>" alt=""></a>
                </div>
                <div class="post_info">
                    <h3><a href="<?php echo url_for1('@hq_new_detail?slug=' . $new->slug) ?>">
                            <?php echo $new->title ?>
                        </a></h3>
                    <span>
                    <?php echo date('Y-m-d', strtotime($new->published_time)) ?>
                    </span>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>