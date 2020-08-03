<?php if (count($arrData)): ?>
    <div class="tabbed-content">

        <ul class="nav nav-line-bottom nav-uppercase nav-size-normal nav-left">
            <?php foreach ($arrData as $idx => $cat): ?>
                <?php if (count($cat['data'])): ?>
                    <li class="tab <?php echo $idx == '0' ? 'active' : '' ?> has-icon"><a
                                href="#<?php echo $cat['id'] ?>"><span><?php echo strtoupper($cat['title']) ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div class="tab-panels">
            <?php foreach ($arrData as $idx => $cat): ?>
                <?php if (count($cat['data'])): ?>
                    <div class="panel <?php echo $idx == '0' ? 'active' : '' ?> entry-content"
                         id="<?php echo $cat['id'] ?>">


                        <div class="row large-columns-1 medium-columns-1 small-columns-1 row-collapse">
                            <?php foreach ($cat['data'] as $new): ?>
                                <?php
                                $arrCatInfo = json_decode($new->cat_slug, true);
                                $catInfo = $arrCatInfo[0];
                                $link = url_for1(sprintf('@newDetail?cat_slug=%s&slug=%s', $cat['slug'], $new->slug));
                                $pathImg = '/uploads/' . sfConfig::get('app_article_images') . $new->image_path;
                                $img = VtHelper::getThumbUrl($pathImg, 92, 60);

                                ?>
                                <div class="col post-item">
                                    <div class="col-inner">
                                        <a href="<?php echo $link; ?>"
                                           class="plain">
                                            <div class="box box-vertical box-text-bottom box-blog-post has-hover">
                                                <div class="box-image" style="width:25%;">
                                                    <div class="image-cover" style="padding-top:65%;">
                                                        <img width="800" height="300"
                                                             src="<?php echo sfConfig::get('app_img_lazy') ?>"
                                                             data-src="<?php echo $img ?>"
                                                             class="lazy-load attachment-original size-original wp-post-image"
                                                             alt="" srcset=""
                                                             data-srcset="<?php echo $img ?> 300w"
                                                             sizes="(max-width: 800px) 100vw, 800px"/>
                                                    </div>
                                                </div><!-- .box-image -->
                                                <div class="box-text text-left is-small">
                                                    <div class="box-text-inner blog-post-inner">


                                                        <h5 class="post-title is-large ">
                                                            <?php echo $new->title ?>
                                                        </h5>
                                                        <div class="post-meta is-small op-8">
                                                            <?php echo date('Y/m/d', strtotime($new->updated_at)) ?>
                                                        </div>
                                                        <div class="is-divider"></div>


                                                    </div><!-- .box-text-inner -->
                                                </div><!-- .box-text -->
                                            </div><!-- .box -->
                                        </a><!-- .link -->
                                    </div><!-- .col-inner -->
                                </div><!-- .col -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>