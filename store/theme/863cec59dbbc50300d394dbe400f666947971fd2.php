<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="<?php echo e(THEME_ADMIN); ?>/css/font.css">
    <link rel="stylesheet" href= "<?php echo e(THEME_ADMIN); ?>/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(THEME_ADMIN); ?>/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo e(THEME_ADMIN); ?>/js/xadmin.js"></script>

</head>
<body class="login-bg">

<div class="login">
    <div class="message">管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" >
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>

<script>
    $(function  () {
        layui.use('form', function(){
            var form = layui.form;

            form.on('submit(login)', function(data){
                console.log(data.field);
                $.post("/index/pushLogin", { username: data.field.username, passwd: data.field.password },function(e){
                        layer.msg(e.msg);
                          if (e.status == 'success') {
                                window.location.href = e.data.url;
                                return true;
                          }
                          return false;
                 });
                return false;
            });
        });
    })


</script>
<!-- 底部结束 -->
</body>
</html>