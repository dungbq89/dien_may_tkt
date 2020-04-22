<?php
/**
 * Created by PhpStorm.
 * User: conghuyvn8x
 * Date: 7/6/2017
 * Time: 3:25 PM
 */
$listSlide = $slide['AdvertiseImage'];
if (!empty($listSlide)) {
?>

<div class="col-lg-9 col-md-12">
    <div class="slider_area owl-carousel">
        <?php foreach ($listSlide as $item){
        ?>
        <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo VtHelper::getPathImage($item['file_path'], sfConfig::get('app_advertise_images', 'advertise')) ?>">
            <div class="slider_content">
                <a class="button" href="<?php echo $item['link'] != '' ? $item['link'] : 'javascript:void(0)' ?>"><?php echo __('Detail'); ?></a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
