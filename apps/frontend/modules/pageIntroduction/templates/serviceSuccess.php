<?php
include_component('moduleMenu', 'breadscrumbs', array('arrBread' => array(__('Service'),  $html->name)));
?>
<div class="about_section mt-32">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <?php echo $html['content']; ?>
            </div>
        </div>
    </div>
</div>
