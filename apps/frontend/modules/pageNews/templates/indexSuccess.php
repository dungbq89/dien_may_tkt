<?php
$articles = $pager->getResults();
?>
<main id="main" class="">

    <div id="content" class="blog-wrapper blog-archive page-wrapper">


        <div class="row row-large ">

            <div class="large-9 col">


                <div id="row-1507254904" class="row large-columns-3 medium-columns- small-columns-1 row-masonry"
                     data-packery-options="{&quot;itemSelector&quot;: &quot;.col&quot;, &quot;gutter&quot;: 0, &quot;presentageWidth&quot; : true}"
                     style="position: relative; height: 438.112px;">
                    <?php if (count($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <?php
                            /** @var $article AdArticle */
                            $link = url_for1(sprintf('@newDetail?slug=%s', $article->slug));
                            $path = '/uploads/' . sfConfig::get('app_article_images') . $article->image_path;
                            $img = VtHelper::getThumbUrl($path, 300, 169);
                            ?>
                            <div class="col post-item">
                                <div class="col-inner">
                                    <a href="<?php echo $link ?>"
                                       class="plain">
                                        <div class="box box-text-bottom box-blog-post has-hover">
                                            <div class="box-image">
                                                <div class="image-cover" style="padding-top:56%;">
                                                    <img width="300" height="169"
                                                         src="<?php echo $img ?>"
                                                         data-src="<?php echo $img ?>"
                                                         class="attachment-medium size-medium wp-post-image lazy-load-active"
                                                         alt=""
                                                         srcset="<?php echo $img ?> 300w, <?php echo $img ?> 768w, <?php echo $img ?> 800w"
                                                         data-srcset="<?php echo $img ?> 300w, <?php echo $img ?> 768w, <?php echo $img ?> 800w"
                                                         sizes="(max-width: 300px) 100vw, 300px"></div>
                                            </div><!-- .box-image -->
                                            <div class="box-text text-left">
                                                <div class="box-text-inner blog-post-inner">


                                                    <h5 class="post-title is-large ">
                                                        <?php echo $article->title ?>
                                                    </h5>
                                                    <div class="is-divider"></div>
                                                    <p class="from_the_blog_excerpt ">
                                                        <?php echo $article->header ?>
                                                    </p>


                                                </div><!-- .box-text-inner -->
                                            </div><!-- .box-text -->
                                            <div class="badge absolute top post-date badge-square">
                                                <div class="badge-inner">
                                                    <span class="post-date-day"><?php echo date('d', strtotime($article->published_time)) ?></span><br>
                                                    <span class="post-date-month is-xsmall">Th<?php echo date('m', strtotime($article->published_time)) ?></span>
                                                </div>
                                            </div>
                                        </div><!-- .box -->
                                    </a><!-- .link -->
                                </div><!-- .col-inner -->
                            </div><!-- .col -->
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>


                <?php if ($pager && $pager->haveToPaginate()): ?>
                    <div class="container">
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers nav-pagination links text-center">
                                <?php if ($pager->getPage() >= 2): ?>
                                    <li><a class="prev page-number"
                                           href="<?php echo url_for1(sprintf('@news?%s', VtHelper::getUrlCat(''))) ?>"><i
                                                    class="icon-angle-left"></i></a></li>
                                <?php endif; ?>
                                <?php foreach ($pager->getLinks() as $pg): ?>
                                    <?php if ($pg == $pager->getPage()): ?>
                                        <li><span aria-current="page"
                                                  class="page-number current"><?php echo $pager->getPage() ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li><a class="page-number"
                                               href="<?php echo url_for1(sprintf('@news?%s', VtHelper::getUrlCat($pg))) ?>"><?php echo $pg ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($pager->getPage() < $pager->getLastPage()): ?>
                                    <li><a class="next page-number"
                                           href="<?php echo url_for1(sprintf('@news?%s', VtHelper::getUrlCat($pager->getLastPage()))) ?>"><i
                                                    class="icon-angle-right"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>

            </div> <!-- .large-9 -->

            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <?php include_component('pageNews', 'navNew'); ?>
                </div><!-- #secondary -->
            </div><!-- .post-sidebar -->

        </div><!-- .row -->

    </div><!-- .page-wrapper .blog-wrapper -->


</main>