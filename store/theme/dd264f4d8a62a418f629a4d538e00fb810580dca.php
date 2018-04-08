<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <title><?php echo e($system['website']); ?>-收录最全面的福利导航</title>
    <meta name="keywords" content="<?php echo e($system['keyword']); ?>">
    <meta name="description" content="<?php echo e($system['descr']); ?>">
    <link rel="stylesheet" id="da-main-css" href="/public/style.css?v0.12" type="text/css" media="all">
</head>
<body class="page page-id-5013 page-template page-template-pagesnav-php">
<div class="pageheader">
    <div class="container">
        <h1><a href="/" title="<?php echo e($system['website']); ?>-<?php echo e($system['descr']); ?>"><?php echo e($system['website']); ?></a></h1>
        <div class="note">
            <?php echo $system['notice']; ?>

        </div>
    </div>
</div>
<section class="container" id="navs">
    <nav>
        <li id="nvabar-item-index"><a href="/#top" target="_self">首页</a></li>
        <?php $__currentLoopData = $sort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li id="navbar-category-<?php echo e($key + 1); ?>"><a href="/#<?php echo e($value->code); ?>" target="_self"><?php echo e($value->title); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </nav>
    <div class="items">
        <?php if(!empty($system['banner_img'])): ?>
        <div class="adbannersss">
            <a href="<?php echo e($system['banner_url']); ?>" target="_blank">
                <img src="<?php echo e($system['banner_img']); ?>" data-bd-imgshare-binded="1">
            </a>
        </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</section>
<div id="footer">
    <div class="container">
        <p>&copy; Copyright <?php echo e($system['weblink']); ?> All rights reserved. Power By <a target="_blank" href="/" title="<?php echo e($system['website']); ?>"><?php echo e($system['website']); ?></a>
        </p>
        <p><?php echo e($system['website']); ?>（<?php echo e($system['weblink']); ?>）秉承创建完全绿色无广告福利导航的宗旨，努力打造福利导航第一品牌！</p>
        <div style="display: none">
            <?php echo $system['count']; ?>

        </div>
    </div>
</div>
<div style="position:absolute; top:50%;left:50%; width:300px; height:auto; margin-top:-150px; margin-left:-150px;background-color: #fff;display: none" id="alertWindow">
    <div class="header-title">提示信息</div>
    <div class="content-body"></div>
    <div class="footer-button">
        <button id="closeWindow">关闭</button>
    </div>
</div>
<script type="application/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<?php echo $__env->yieldContent('script'); ?>
<script type="application/javascript">
    $(document).on('click','#closeWindow',function(data){$("#alertWindow").fadeOut(100)});function alertWind(text){$(".content-body").text(text);$("#alertWindow").fadeIn(100)}
</script>
</body>
</html>