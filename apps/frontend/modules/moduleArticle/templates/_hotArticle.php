<h4 class="title">
                        <span class="pull-left"><span class="text"><span
                                    class="line"><strong>Tin tức</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a
                                            class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
</h4>

<div id="myCarousel-2" class="myCarousel carousel slide">
    <div class="carousel-inner">
        <div class="active item">
            <ul class="thumbnails">
                <?php
                foreach ($articles as $value):
                    $path = '/uploads/' . sfConfig::get('app_article_images') . $value['image_path'];
                    ?>
                    <li class="span3">
                        <div class="product-box">
                            <span class="sale_tag"></span>

                            <p><a href="<?php echo url_for2('article_detail', array('slug' => $value['slug'])) ?>"><img
                                        src="<?php echo VtHelper::getThumbUrl($path, 187, 125, 'image_default') ?>"
                                        alt=""/></a></p>
                            <a href="<?php echo url_for2('article_detail', array('slug' => $value['slug'])) ?>"
                               class="title-news"><?php echo VtHelper::truncate($value['title'], 80, '...'); ?></a><br/>

                            <p class="description-news"><?php echo VtHelper::truncate($value['header'], 150, '...'); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>