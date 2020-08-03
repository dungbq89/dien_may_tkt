<?php
$products = $pager->getResults();
?>
<!--slider area start-->
<section class="slider_section mb-50">
    <div class="container">
        <div class="row">
            <?php include_component('pageHome', 'department'); ?>

            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_title">
                    <h1><?php echo __('SEARCH RESULTS: ').htmlspecialchars($queryName); ?></h1>
                </div>

                <!--shop toolbar end-->

                <?php include_partial('pageProduct/listProduct', array('products' => $products)) ?>

                <?php if ($pager && $pager->haveToPaginate()): ?>
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <?php if ($pager->getPage() >= 2): ?>
                                    <li><a href="<?php echo url_for1('@hq_brand?slug=' . $category->slug) ?>">
                                            <i class="fa fa-angle-left"></i></a></li>
                                <?php endif; ?>
                                <?php foreach ($pager->getLinks() as $page): ?>
                                    <li class="<?php echo $page == $pager->getPage() ? 'current' : '' ?>">
                                        <a href="<?php echo url_for1('@hq_brand?slug=' . $category->slug . '&page=' . $page) ?>">
                                            <?php echo $page ?></a></li>
                                <?php endforeach; ?>
                                <?php if ($pager->getPage() < $pager->getLastPage()): ?>
                                    <li>
                                        <a href="<?php echo url_for1('@hq_brand?slug=' . $category->slug . '&page=' . $pager->getLastPage()) ?>"><i
                                                    class="fa fa-angle-right"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <!--shop toolbar end-->
            <!--shop wrapper end-->
        </div>
    </div>
    </div>

</section>