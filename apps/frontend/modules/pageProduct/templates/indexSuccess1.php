<script type="text/javascript">
    $(document).ready(function() {
        $("body").removeClass("home-index");
        $("body").addClass("catalog-category");
    });
</script>
<div class="master-two-column">
    <div class="main-top desk">
        <img src="http://www.cattuongled.com.vn/Themes/CatTuongLed/Content/images/banner-main-top.jpg">
    </div>
    <div class="breadcrumb br-category">
        <h1><?php echo htmlspecialchars($catName); ?></h1>
    </div>
    <div class="side-2">

        <?php include_component('moduleProduct','boxSupport'); ?>

    </div>
    <div class="center-2">
        <div class="page category-page">
            <div class="page-body">
                <div class="product-grid">
                    <?php if (isset($listProduct)): ?>




                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center"><?php echo htmlspecialchars($catName); ?></h2>
                            <?php
                            foreach ($listProduct as $product):
                                $path = '/uploads/' . sfConfig::get('app_product_images') . $product['image_path'];
                                ?>
                                <div class="item-box">
                                    <div class="product-item" data-productid="123">
                                        <div class="picture">
                                            <a href="<?php echo url_for2('product_detail', array('slug'=>$product->getSlug())) ?>" title="<?php echo htmlspecialchars($product->product_name) ?>">
                                                <img alt=""
                                                     src="<?php echo VtHelper::getThumbUrl($path, 150, 185, 'default') ?>"
                                                     width="150" title="Xem đầy đủ: Bản lề sàn S180 (110kg)"/>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <h2 class="product-title" style="font-size: 15px;">
                                                <a href="<?php echo url_for2('product_detail', array('slug'=>$product->getSlug())) ?>"><?php echo htmlspecialchars($product->product_name) ?></a>
                                            </h2>

                                            <div class="add-info">
                                                <div class="prices">
                                                    <span class="price actual-price">
                                                        <?php
                                                        if ($product->getPrice()) echo number_format($product->getPrice(), 0, '', '.') . 'đ';
                                                        else echo 'Liên hệ';
                                                        ?>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                            <?php
                            if ($pager->haveToPaginate()) {
                                include_component("common", "pagging", array('redirectUrl' => $url_paging, 'pager' => $pager, 'vtParams' => array('slug' => sfContext::getInstance()->getRequest()->getParameter('slug'))));
                            }
                            ?>
                        </div><!--features_items-->
                    <?php endif; ?>



                </div>

            </div>
        </div>


    </div>

</div>

