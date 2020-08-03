<div class="col-lg-3 col-md-12">
    <div class="categories_menu">
        <div class="categories_title">
            <h2 class="categori_toggle"><?php echo __('PRODUCTS'); ?></h2>
        </div>
        <div class="categories_menu_toggle">
            <ul>
                <?php
                if (isset($data) && count($data)) {
                    foreach ($data as $cat) {
                        ?>
                        <li>
                            <a href="<?php echo url_for1('@hq_product?slug=' . $cat['slug']) ?>"> <?php echo $cat['name']; ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <?php if ($listAttr):
        foreach ($listAttr as $attr) :
            $name = $attr->AdAttr->name;
//            $slug = $attr->AdAttr->slug;
            // lay danh sach attr con
            $childs = $attr->AdAttr->getListChildAttr();
            if (count($childs)):
                ?>
                <aside class="sidebar_widget">
                    <div class="widget_inner">

                        <div class="widget_list widget_categories">
                            <h2><?php echo $name ?></h2>
                            <ul>
                                <?php foreach ($childs as $child):
                                    $check = in_array($child->slug, $arrFilter, true);
                                    $link = VtHelper::genUrlFilter(url_for1(sprintf('@hq_product?slug=%s', $slug)), $arrFilter, $child->slug, $check);
                                    ?>
                                    <li>
                                        <input type="checkbox" <?php echo $check ? 'checked="checked"' : '' ?>
                                               onclick="window.location='<?php echo $link ?>'">
                                        <a href="<?php echo $link ?>">
                                            <?php echo $child->name ?>
                                        </a>
                                        <span class="checkmark"></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                </aside>
            <?php
            endif;
        endforeach;
    endif;
    ?>
</div>