<main id="main" class="">


    <div class="page-wrapper page-right-sidebar">
        <div class="row">

            <div id="content" class="large-9 left col col-divided" role="main">
                <div class="page-inner">
                    <?php echo VtHelper::strip_html_default_tags($html->content) ?>
                </div><!-- .page-inner -->
            </div><!-- .#content large-9 left -->

            <div class="large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <?php include_component('pageNews', 'navNew'); ?>

                </div><!-- #secondary -->
            </div><!-- .sidebar -->

        </div><!-- .row -->
    </div><!-- .page-right-sidebar container -->


</main>