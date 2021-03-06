@extends('admin.layout')
@section('content')
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_email" name="title" required="" value="@if(isset($data->id)){{ $data->title }}@endif" lay-verify="checktitle"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>链接
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="link" required="" value="@if(isset($data->id)){{ $data->link }}@endif" lay-verify="nikename"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">

                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_EMAIL" class="layui-form-label">
                    <span class="x-red"></span>管理Email
                </label>
                <div class="layui-input-inline">
                    <input type="email" id="L_EMAIL" name="email" value="@if(isset($data->id)){{ $data->email }}@endif"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="type" class="layui-form-label">
                    <span class="x-red"></span>类型
                </label>
                <div class="layui-input-block">
                    <input type="radio" name="type" value="0" title="常规" @if(isset($data->id)) @if($data->type == 0) checked @endif @else checked @endif >
                    <input type="radio" name="type" value="1" title="推荐" @if(isset($data->id) && $data->type == 1) checked @endif >
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_color" class="layui-form-label">
                    <span class="x-red"></span>字体颜色
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_color" name="color" value="@if(isset($data->id)){{ $data->color }}@endif"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_status" class="layui-form-label">
                    <span class="x-red"></span>状态
                </label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="0" title="正常" @if(isset($data->id)) @if($data->status == 0) checked @endif @else checked @endif >
                    <input type="radio" name="status" value="1" title="锁定" @if(isset($data->status) && $data->status == 1) checked @endif>
                    <input type="radio" name="status" value="2" title="黑名单" @if(isset($data->status) && $data->status == 2) checked @endif>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <input type="hidden" name="id" value="@if(isset($data->id)){{ $data->id }}@endif">
                <input type="hidden" name="sortid" value="@if(isset($sort->id)){{ $sort->id }}@endif">
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    增加
                </button>
            </div>
        </form>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            var form = layui.form
                ,layer = layui.layer;

            //自定义验证规则
            form.verify({
                checktitle: function(value){
                    if(value == ''){
                        return '名称不能为空';
                    }
                }
                ,nikename: function(value){
                    if(value == ''){
                        return '链接不能为空';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function(data){

                $.post("/submerApi/linksAdd", { title: data.field.title, link: data.field.link,email:data.field.email,type:data.field.type,status:data.field.status,sortid:data.field.sortid,id:data.field.id,color:data.field.color },function(e){
                    if (e.status == 'success') {
                        layer.alert(e.msg, {icon: 6},function () {
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                        });
                    }else{
                        layer.alert(e.msg,{icon:1});
                    }
                });
                return false;
            });


        });
    </script>
@endsection