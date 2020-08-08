<div class="slider-wrapper relative " id="slider-660953540">
    <div class="slider slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal"
         data-flickity-options='{
            "cellAlign": "center",
            "imagesLoaded": true,
            "lazyLoad": 1,
            "freeScroll": false,
            "wrapAround": true,
            "autoPlay": 3000,
            "pauseAutoPlayOnHover" : true,
            "prevNextButtons": true,
            "contain" : true,
            "adaptiveHeight" : true,
            "dragThreshold" : 5,
            "percentPosition": true,
            "pageDots": true,
            "rightToLeft": false,
            "draggable": true,
            "selectedAttraction": 0.1,
            "parallax" : 0,
            "friction": 0.6        }'
    >
        <?php if (count($slides)): ?>
            <?php foreach ($slides as $slide): ?>
                <?php
                /** @var $slide AdAdvertiseImage */
                $pathImg = '/uploads/' . sfConfig::get('app_advertise_images', 'advertise') . $slide->file_path;
                $img = VtHelper::getThumbUrl($pathImg, 753, 300);

                ?>
                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_<?php echo $slide->id ?>">
                    <div class="img-inner image-cover dark" style="padding-top:40%;">
                        <img width="800" height="300"
                             src="<?php echo $img ?>"
                             class="attachment-original size-original" alt=""
                             srcset="<?php echo $img ?> 800w, <?php echo $img ?> 300w, <?php echo $img ?> 768w"
                             sizes="(max-width: 800px) 100vw, 800px"/>
                    </div>

                    <style scope="scope">

                        #image_<?php echo $slide->id ?> {
                            width: 100%;
                        }
                    </style>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>

    <div class="loading-spin dark large centered"></div>

    <style scope="scope">
    </style>
</div>