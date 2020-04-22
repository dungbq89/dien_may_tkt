<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    <meta property="og:type" content="article">
    <meta name="revisit" content="1 days"/>
    <meta name="robots" content="index,follow"/>
    <meta name="googlebot" content="index,follow"/>
    <meta name="language" content="vi-VN"/>
    <meta name="geo.country" content="VN"/>
    <meta name="geo.region" content="VN-HN"/>
    <meta name="geo.placename" content="Hà Nội"/>
    <meta name="geo.position" content="21.033333;105.85"/>
    <meta name="dc.publisher" content="tubepthangloi.com"/>
    <meta name="dc.identifier" content="tubepthangloi.com"/>
    <meta name="dc.language" content="vi-VN"/>
</head>

<body id="body">


<div class="wapper">
    <?php include_component('moduleMenu', 'header') ?>


    <div class="menu">
        <ul class="ls menu-hori fl">
            <li class="menu-pc"><a href="javascript:void(0)" class="menu-pc-title" rel="nofollow">Danh mục sản phẩm</a>
                <?php include_component('moduleProduct', 'productMenu') ?>

            </li>
            <?php include_component('moduleMenu', 'mainMenu') ?>
        </ul>
        <ul class="ls menu-right">
            <li>Hotline: <span>0984.433.494 - 01633.016.868</span>

            </li>
        </ul>
    </div>

    <?php echo $sf_content;?>
	<div class="clearfix"></div>
    <?php include_component('moduleMenu', 'contentFooter'); ?>

</div>


</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96754217-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
