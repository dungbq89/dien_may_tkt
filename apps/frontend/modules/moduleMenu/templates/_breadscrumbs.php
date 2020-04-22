<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Home'); ?></a></li>
                        <?php
                        if(isset($arrBread) && count($arrBread)){
                            foreach ($arrBread as $bread){
                                echo '<li>'.$bread.'</li>';
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>