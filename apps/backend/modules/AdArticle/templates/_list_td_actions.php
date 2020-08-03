<td nowrap="nowrap">
    <div class="btn-group">
        <?php echo $helper->linkToEdit($ad_article, array('label' => 'Chi tiết', 'params' => array(), 'class_suffix' => 'edit',)) ?>

        <?php echo $helper->linkToDelete($ad_article, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>

    </div>
</td>