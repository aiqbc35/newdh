<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    
    <link rel="stylesheet" href="<?php echo e(THEME_ADMIN); ?>/css/font.css">
    <link rel="stylesheet" href="<?php echo e(THEME_ADMIN); ?>/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(THEME_ADMIN); ?>/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo e(THEME_ADMIN); ?>/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
<script type="application/javascript">
    $(function(){
        $(document).on('click','#update-cache',function(){
            $.get("/submerApi/createHtml", { name: "John", time: "2pm" }, function(data){
                      layer.msg(data.msg);
            },'json');
        });
    });
</script>
</body>
</html>