<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<!--    <title>HQT INTERNATIONAL IMPORT EXPORT JOINT STOCK COMPANY</title>-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <!-- CSS
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/coder_update.css">
    <link rel="stylesheet" href="/assets/css/update.css">

</head>

<body>

<?php include_component('moduleMenu', 'mainMenu'); ?>
<?php echo $sf_content; ?>

<?php include_component('moduleMenu', 'contentFooter'); ?>

<div class="modal fade" id="popup_modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" id="popup_modal_box_content">
        <?php include_component('pageProduct', 'inquiryNowForm') ?>
    </div>
</div>


<div class="loading" style="display: none;">Loading</div>
<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="/assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="/assets/js/main.js"></script>


</body>

</html>