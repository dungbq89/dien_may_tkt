<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form- is-normal">
                        <form role="search" method="get" class="searchform"
                              action="<?php echo url_for1('@search_product') ?>">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="search" class="search-field mb-0" name="s" value=""
                                           placeholder="Vui lòng nhập tên sản phẩm..."/>
<!--                                    <input type="hidden" name="post_type" value="product"/>-->
                                </div><!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit"
                                            class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search"></i></button>
                                </div><!-- .flex-col -->
                            </div><!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
            <?php if (count($mainMenu)): ?>
                <?php foreach ($mainMenu as $idx => $mm): ?>
                    <!--                    current-menu-item-->
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-1125">
                        <a href="<?php echo VtHelper::getLinkMM($mm['link']) ?>"
                           class="nav-top-link"><?php echo $mm['name'] ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>

        </ul>
    </div><!-- inner -->
</div><!-- #mobile-menu -->