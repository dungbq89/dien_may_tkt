<nav id="menu">
    <ul>
        <li><a href="/"><?php echo __("Trang chủ"); ?></a></li>
        <li><a href="<?php echo url_for2('about_us'); ?>"><?php echo __('Về chúng tôi') ?></a></li>
        <li><a href="<?php echo url_for2('chain'); ?>"><?php echo __("Căn hộ") ?></a></li>
        <li> <a href="<?php echo url_for2('services'); ?>"><?php echo __('Dịch vụ') ?></a></li>
        <li><a href="/photos/"><?php echo __('Bộ sưu tập') ?></a>
            <?php
            if(isset($listAlbum) && count($listAlbum)){
            echo '<ul>';
            foreach ($listAlbum as $album){
            ?>
        <li><a href="/photo-newland-1/"><?php echo $album['name']; ?></a></li>
        <?php
        }
        echo '</ul>';
        }
        ?>
        </li>
        <li><a href="<?php echo url_for2('news'); ?>"><?php echo __('Tin tức') ?></a></li>
    </ul>
</nav>