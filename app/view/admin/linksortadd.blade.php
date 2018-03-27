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
                    <span class="x-red">*</span>简称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="code" required="" value="@if(isset($data->id)){{ $data->code }}@endif" lay-verify="nikename"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会根据简称跳转
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>排序
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_pass" name="sorting" required="" value="@if(isset($data->id)){{ $data->sorting }}@else 0 @endif"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    数字越大排序越靠前
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <input type="hidden" name="id" value="@if(isset($data->id)){{ $data->id }}@endif">
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
                        return '简称不能为空';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function(data){

                $.post("/submerApi/addSort", { title: data.field.title, code: data.field.code,sorting:data.field.sorting,id:data.field.id },function(e){
                          if (e.status == 'success') {
                              layer.alert(e.msg, {icon: 6},function () {
                                  // 获得frame索引
                                  var index = parent.layer.getFrameIndex(window.name);
                                  //关闭当前frame
                                  parent.layer.close(index);
                              });
                          }else{
                                layer.msg(e.msg);
                                return false;
                          }
                 });
            });


        });
    </script>
@endsection