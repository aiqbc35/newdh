@extends('admin.layout')
@section('content')
<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="./index.html">X-admin v2.0</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">{{ $_SESSION['username']['username'] }}</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="/submer/logout">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        <li class="layui-nav-item to-index" id="update-cache"><a href="javascript:;">更新缓存</a></li>
    </ul>
</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>链接管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            <cite>链接列表</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            @foreach($sort as $value)
                            <li>
                                <a _href="/submer/links/sort/{{ $value->id }}">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>{{ $value->title }}</cite>
                                </a>
                            </li >
                            @endforeach
                        </ul>
                    </li >
                    <li>
                        <a _href="/submer/links_sort">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>链接分类</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="admin-list.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6ce;</i>
                    <cite>系统管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/submer/system">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>系统设置</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li>我的桌面</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='/submer/welcome' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="page-content-bg"></div>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->
<!-- 底部开始 -->
<div class="footer">
    <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved</div>
</div>
<!-- 底部结束 -->
@endsection