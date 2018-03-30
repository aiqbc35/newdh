<?php $__env->startSection('content'); ?>
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="website" class="layui-form-label">
                    <span class="x-red">*</span>网站名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="website" name="website" required="" lay-verify="required"
                           autocomplete="off" class="layui-input" value="<?php echo e($data->website); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="weblink" class="layui-form-label">
                    <span class="x-red">*</span>永久网址
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="weblink" name="weblink" required="" lay-verify="required"
                           autocomplete="off" class="layui-input" value="<?php echo e($data->weblink); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>网站永久网址
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    广告邮箱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_email" name="email" required=""
                           autocomplete="off" class="layui-input" value="<?php echo e($data->email); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="newlink" class="layui-form-label">
                    <span class="x-red">*</span>最新网址
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="newlink" name="newlink" required="" lay-verify="required"
                           autocomplete="off" class="layui-input" value="<?php echo e($data->newlink); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>网站友情链接网址
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">公告</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="notice"><?php echo e($data->notice); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">关键字</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="keyword"><?php echo e($data->keyword); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">描述</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="descr"><?php echo e($data->descr); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">统计代码</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="count"><?php echo e($data->count); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="banner_img" class="layui-form-label">
                    首页广告图片
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="banner_img" name="banner_img"
                           autocomplete="off" class="layui-input" value="<?php echo e($data->banner_img); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="banner_url" class="layui-form-label">
                    首页广告链接
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="banner_url" name="banner_url" required=""
                           autocomplete="off" class="layui-input" value="<?php echo e($data->banner_url); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    保存
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

            });
            //监听提交
            form.on('submit(add)', function(data){

                $.post("/submerApi/saveSystem", data.field,function(e){
                    layer.alert(e.msg,{icon: 6});
                 });
                return false;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>