
<!--banner area start-->
<section class="banner_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_container">
                    <?php if(isset($services) && $services){
                        foreach ($services as $service){
                            $path = '/uploads/' . sfConfig::get('app_product_images') . $service['image_path'];
                            ?>
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href="<?php echo url_for('service', array('slug' => $service['slug'])); ?>"><img src="<?php echo VtHelper::getThumbUrl($path, 550, 220, 'default') ?>" alt=""></a>
                                    <div class="banner_text">
                                        <h3><?php echo $service['name'] ?></h3>
                                        <h2><?php echo $service['description'] ?></h2>
                                        <a href="<?php echo url_for('service', array('slug' => $service['slug'])); ?>"><?php echo __('Detail'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--banner area end-->