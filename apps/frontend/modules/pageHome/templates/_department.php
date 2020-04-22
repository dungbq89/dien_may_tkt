<div class="col-lg-3 col-md-12">
    <div class="categories_menu">
        <div class="categories_title">
            <h2 class="categori_toggle"><?php echo __('BROWSE CATEGORIES'); ?></h2>
        </div>
        <div class="categories_menu_toggle">
            <ul>
                <?php
                if (isset($data) && count($data)) {
                    foreach ($data as $brand) {
                        ?>
                        <li>
                            <a href="<?php echo url_for1('@hq_brand?slug=' . $brand['slug']) ?>"> <?php echo $brand['name']; ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>