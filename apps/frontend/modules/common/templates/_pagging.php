<?php
$params = array();
if (isset($vtParams)) {
    foreach ($vtParams as $key => $value) {
        $params = array_merge(array($key => $value), $params);
    }
}
?>
<?php if ($pager->haveToPaginate()): ?>
    <div class="pages fl">
        <ul class="pages-inner none fl">
            <?php if ($pager->getPage() != $pager->getFirstPage()): ?>
                <li><a class="prev"
                       href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getPreviousPage()), $params)); ?>">&laquo;</a>
                </li>
            <?php endif; ?>
            <?php foreach ($pager->getLinks() as $page): ?>
                <?php if ($page == $pager->getPage()): ?>
                    <li><a href="#" class="active"><?php echo $page ?></a></li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo url_for($redirectUrl, array_merge(array('page' => $page), $params)) ?>"><?php echo $page ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($pager->getPage() != $pager->getLastPage()) : ?>
                <li><a class="prev"
                       href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getNextPage()), $params)); ?>">&raquo;</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>

<style type="text/css">
    .paging ul li {
        list-style: none;
    }

    .pages {
        width: 100%;
        text-align: center;
    }

    .pages ul {
        margin: 2px auto;
        line-height: 1.4;
        padding-left: 0;
    }

    .pages ul li {
        display: inline;
        text-align: center;
    }

    .pages-inner {
        margin: 10px 0 0;
    }

    .pages-inner li {
        /*float: left;*/
    }

    .pages-inner li a {
        background: none repeat scroll 0 0 #FFFFFF;
        border: 1px solid #DDDDDD;
        color: #666666;
        display: inline-block;
        font-size: 12px;
        font-weight: bold;
        margin: 0 4px 0 0;
        min-width: 10px;
        padding: 8px 10px;
        text-align: center;
    }

    .pages-inner li a.active, .pages-inner li a:hover {
        background: none repeat scroll 0 0 #d6280d;
        color: #FFFFFF;
    }
</style>