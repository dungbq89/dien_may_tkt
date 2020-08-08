<?php
/** @var $new AdArticle */
$img = '/uploads/' . sfConfig::get('app_article_images') . $new->image_path;
$imgSocial = sfConfig::get('app_host_url') .'/uploads/' . sfConfig::get('app_article_images') . $new->image_path;
$link = sfConfig::get('app_host_url') . url_for1('@newDetail?slug=?' . $new->slug);
?>
<main id="main" class="">

    <div id="content" class="blog-wrapper blog-single page-wrapper">


        <div class="row row-large ">

            <div class="large-9 col">


                <article id="post-414"
                         class="post-414 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
                    <div class="article-inner ">
                        <header class="entry-header">
                            <div class="entry-header-text entry-header-text-top text-left">
                                <h6 class="entry-category is-xsmall">
                                    <a href="<?php echo url_for1('@news') ?>" rel="category tag">Tin tức</a></h6>

                                <h1 class="entry-title"><?php echo $new->title ?></h1>
                                <div class="entry-divider is-divider small"></div>

                                <div class="entry-meta uppercase is-xsmall">
                                    <span class="posted-on">Posted on <a
                                                href="<?php echo $link ?>"
                                                rel="bookmark"><time class="entry-date published updated"
                                                                     datetime="<?php echo date('d-m-Y H:i:s', strtotime($new->published_time)) ?>"><?php echo date('d/m/Y', strtotime($new->published_time)) ?></time></a></span>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-header -->

                            <div class="entry-image relative">
                                <a href="<?php echo $link ?>">
                                    <img width="800" height="533"
                                         src="<?php echo $img ?>"
                                         data-src="<?php echo $img ?>"
                                         class="attachment-large size-large wp-post-image lazy-load-active" alt=""
                                         srcset="<?php echo $img ?> 800w, <?php echo $img ?> 300w, <?php echo $img ?> 768w"
                                         data-srcset="<?php echo $img ?> 800w, <?php echo $img ?> 300w, <?php echo $img ?> 768w"
                                         sizes="(max-width: 800px) 100vw, 800px"></a>
                                <div class="badge absolute top post-date badge-square">
                                    <div class="badge-inner">
                                        <span class="post-date-day"><?php echo date('d', strtotime($new->published_time)) ?></span><br>
                                        <span class="post-date-month is-small">Th<?php echo date('m', strtotime($new->published_time)) ?></span>
                                    </div>
                                </div>
                            </div><!-- .entry-image -->
                        </header><!-- post-header -->
                        <div class="entry-content single-page">

                            <?php echo VtHelper::strip_html_tags_and_decode_puri($new->body) ?>


                            <div class="blog-share text-center">
                                <div class="is-divider medium"></div>
                                <div class="social-icons share-icons share-row relative icon-style-outline ">
                                    <a
                                            href="//www.facebook.com/sharer.php?u=<?php echo $link ?>"
                                            data-label="Facebook"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip facebook tooltipstered"><i
                                                class="icon-facebook"></i></a><a
                                            href="//twitter.com/share?url=<?php echo $link ?>"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip twitter tooltipstered"><i
                                                class="icon-twitter"></i></a>

                                    <a
                                            href="//pinterest.com/pin/create/button/?url=<?php echo $link ?>&amp;media=<?php echo $imgSocial ?>&amp;description=<?php echo urlencode($new->title) ?>"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip pinterest tooltipstered"><i
                                                class="icon-pinterest"></i></a><a
                                            href="//plus.google.com/share?url=<?php echo $link ?>"
                                            target="_blank"
                                            class="icon button circle is-outline tooltip google-plus tooltipstered"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow"><i class="icon-google-plus"></i></a><a
                                            href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $link ?>&amp;title=<?php echo urlencode($new->title) ?>"
                                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                            rel="noopener noreferrer nofollow" target="_blank"
                                            class="icon button circle is-outline tooltip linkedin tooltipstered"><i
                                                class="icon-linkedin"></i></a></div>
                            </div>
                        </div><!-- .entry-content2 -->



                    </div><!-- .article-inner -->
                </article><!-- #-414 -->

            </div> <!-- .large-9 -->

            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <?php include_component('pageNews', 'navNew'); ?>
                </div><!-- #secondary -->
            </div><!-- .post-sidebar -->

        </div><!-- .row -->

    </div><!-- #content .page-wrapper -->


</main>