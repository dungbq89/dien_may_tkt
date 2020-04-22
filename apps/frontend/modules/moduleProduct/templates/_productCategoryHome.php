<?php
if (isset($productCategory) && count($productCategory)) {
    foreach ($productCategory as $key => $value) {
        $categoryChild = $value->getCategoryByParent(6);
        if (count($categoryChild)>=0) {
            ?>
            <div class="dientuamthanh all">
                <div class="top_product">
                    <div id="it"><?php echo htmlspecialchars($value->getName()); ?></div>
                    <div class="list_sp">
                        <ul>
                            <?php
                            if(count($categoryChild)) {
                                foreach ($categoryChild as $child) {
                                    ?>
                                    <li><a title="<?php echo htmlspecialchars($child->getName()); ?>"
                                           href="<?php echo url_for2('products', array('slug' => $child->slug)) ?>"><?php echo htmlspecialchars($child->getName()); ?></a>
                                    </li>
                                <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="gachvang"></div>
                <?php
                    $productHome = $value->getProductHomeByCategory(10);
                    if(count($productHome)){
                        ?>
                        <div class="views_sp">
                            <ul class="list-item">
                                <?php
                                    foreach($productHome as $product){
                                        $percent = 0;
                                        if ($product['price_promotion'] && $product['price_promotion'] != 0) {
                                            if ($product['price'] && $product['price'] != 0) {
                                                $subPer = intval($product['price'])- intval($product['price_promotion']);
                                                $percent = round(($subPer/ $product['price']) * 100);
                                            }
                                        }
                                        $path = '/uploads/' . sfConfig::get('app_product_images') . $product['image_path'];
                                        ?>
                                        <li>
                                            <div class="bos_sp2">
                                                <a href="<?php echo url_for2('product_detail',array('slug'=>$product['slug'])) ?>" title="<?php echo htmlspecialchars($product['product_name']); ?>">
                                                    <img src="<?php echo VtHelper::getThumbUrl($path, 180, 140, 'product_180_140') ?>"
                                                         alt="<?php echo htmlspecialchars($product['product_name']); ?>"/>
                                                </a>
                                            </div>
                                            <?php if ($percent > 0): ?>
                                                <p class="type-discount">-<?php echo $percent; ?>%</p>
                                            <?php endif; ?>

                    <span class="product-name"><a href="<?php echo url_for2('product_detail',array('slug'=>$product['slug'])) ?>"
                                                  title="<?php echo htmlspecialchars($product['product_name']); ?>"><?php echo htmlspecialchars($product['product_name']); ?></a></span>

                                            <?php
                                            if ($product['price_promotion'] && $product['price_promotion'] != 0) {
                                                if ($product['price'] && $product['price'] != 0) {
                                                    ?>
                                                    <span class="product-pricesave"><?php
                                                        if ($product['price']) {
                                                            echo number_format($product['price'], 0, ",", ".") . ' vnđ';
                                                        }?></span>

                                                    <span class="product-name2"><?php
                                                        echo number_format($product['price_promotion'], 0, ",", ".") . ' vnđ';
                                                        ?>
                                    </span>
                                                <?php
                                                } else {
                                                    ?>
                                                    <span class="product-name2"><?php
                                                        if ($product['price_promotion']) {
                                                            echo number_format($product['price_promotion'], 0, ",", ".") . ' vnđ';
                                                        } else {
                                                            echo 'Liên hệ';
                                                        }
                                                        ?>
                                    </span>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <span class="product-name2"><?php
                                                    if ($product['price']) {
                                                        echo number_format($product['price'], 0, ",", ".") . ' vnđ';
                                                    } else {
                                                        echo 'Liên hệ';
                                                    }
                                                    ?>
                                    </span>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                ?>

                <div class="quangcao fr">
                    <a href="#">

                    </a>
                </div>
            </div>
        <?php
        }
    }
}
?>