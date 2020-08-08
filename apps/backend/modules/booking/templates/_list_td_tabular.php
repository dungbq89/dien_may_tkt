<?php $body = json_decode(sfOutputEscaperArrayDecorator::unescape($booking->getBody()), true);  ?>

<td class="sf_admin_text sf_admin_list_td_full_name"
    field="full_name"><?php echo VtHelper::truncate($booking->getFullName(), 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_phone"
    field="phone"><?php echo VtHelper::truncate($booking->getPhone(), 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_email"
    field="email"><?php echo VtHelper::truncate($booking->getEmail(), 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_book_type"
    field="book_type"><?php echo VtHelper::truncate(VtHelper::getBookType($booking->getBookType()), 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_product_id"
    field="product_id"><?php echo VtHelper::truncate($body['product_name'], 50, '...', true) ?></td>
<td class="sf_admin_text sf_admin_list_td_is_check"
    field="is_check">
    <?php
    if($booking->getIsCheck() == 1){
        echo 'Đang xử lý';
    }elseif($booking->getIsCheck() == 2){
        echo 'Đã xử lý';
    }else{
        echo 'Chưa xử lý';
    }
    ?>
</td>
<td class="sf_admin_text sf_admin_list_td_requirement"
    field="requirement"><?php echo VtHelper::truncate($booking->getRequirement(), 50, '...', true) ?></td>