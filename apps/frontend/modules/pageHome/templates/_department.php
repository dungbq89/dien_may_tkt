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
                                    ?>
                                    <li>
                                        <input type="checkbox" <?php echo $check ? 'checked="checked"' : '' ?>>
                                        <a href="<?php echo VtHelper::genUrlFilter(url_for1(sprintf('@hq_brand?slug=%s', $slug)), $arrFilter, $child->slug, $check) ?>"><?php echo $child->name ?></a>
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
