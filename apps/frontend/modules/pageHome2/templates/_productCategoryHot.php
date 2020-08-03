<?php
if (isset($data) && count($data)) {
    foreach ($data as $category) {
        if (count($category['products']) > 0) {
            ?>
            <section class="product_area mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section_title">
                                <h2><span> <strong><?php echo $category['name'] ?></strong></span></h2>
                            </div>
                            <div class="product_carousel product_column5 owl-carousel">
                                <?php
                                if (!empty($category['products'])) {
                                    foreach ($category['products'] as $product) {
                                        $path = '/uploads/' . sfConfig::get('app_product_images') . $product['image_path'];
                                        ?>
                                        <div class="single_product">
                                            <div class="product_name" style="font-weight: bold">
                                                <h3>
                                                    <a href="<?php echo url_for1('@hq_product_detail?slug=' . $product['slug']) ?>"><?php echo $product['product_name'] ?></a>
                                                </h3>
                                            </div>
                                            <div class="product_thumb">
                                                <a class="primary_img"
                                                   href="<?php echo url_for1('@hq_product_detail?slug=' . $product['slug']) ?>"><img
                                                            src="<?php echo VtHelper::getThumbUrl($path, 178, 178, 'default') ?>"
                                                            alt=""></a>
                                            </div>
                                            <div class="product_content">
                                                <div class="product_footer d-flex align-items-center">
                                                    <div class="price_box" style="text-align: center; color: #fd5018;">
                                                        <span class="product_name"><?php echo __('Contact supplier'); ?></span>
                                                    </div>
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
            </section>
            <!--product area end-->
            <?php
        }
    }
}
?>
