<?php
if (count($advertise) > 0) {
    $type = $advertise[0]['view_type'];
    $advertiseImage = $advertise[0]['AdvertiseImage'];
    $count = count($advertiseImage);
    if ($count > 0) {
        if ($location == 'header') {
            ?>
            <a href="<?php if ($advertiseImage[0]['link']) echo $advertiseImage[0]['link']; ?>" target="_blank">
                <img class="img-adv"
                     src="<?php echo sfConfig::get('app_url_media_file') . '/' . sfConfig::get('app_advertise_images') . $advertiseImage[0]['file_path']; ?>"
                     alt="" width="">
            </a>

        <?php
        } else if ($location == 'right' || $location == 'right_middle') {
            ?>
            <div class="box-adv box-mod">
                <a href="<?php if ($advertiseImage[0]['link']) echo $advertiseImage[0]['link']; ?>" target="_blank">
                    <img class=""
                         src="<?php echo sfConfig::get('app_url_media_file') . '/' . sfConfig::get('app_advertise_images') . $advertiseImage[0]['file_path']; ?>"
                         alt="" width="">
                </a>

            </div>
        <?php
        }
        elseif($location=='bottom'){
            ?>
            <div class="box-adv-main">
                <a href="<?php if ($advertiseImage[0]['link']) echo $advertiseImage[0]['link']; ?>" target="_blank">
                    <img class="img-responsive"
                         src="<?php echo sfConfig::get('app_url_media_file') . '/' . sfConfig::get('app_advertise_images') . $advertiseImage[0]['file_path']; ?>"
                         alt="" width="">
                </a>

            </div>
        <?php
        }
    }
}


?>