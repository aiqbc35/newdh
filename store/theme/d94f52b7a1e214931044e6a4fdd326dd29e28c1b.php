<?php $__env->startSection('content'); ?>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a>
          <cite>链接分类列表</cite></a>
      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加链接','/submer/link_sort_add',600,400)"><i class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px"></span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>ID</th>
                <th>分类名称</th>
                <th>简称</th>
                <th>类型</th>
                <th>排序</th>
                <th>操作</th></tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo e($value->id); ?>'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?php echo e($value->id); ?></td>
                <td><?php echo e($value->title); ?></td>
                <td><?php echo e($value->code); ?></td>
                <td><?php echo e($value->type); ?></td>
                <td><?php echo e($value->sorting); ?></td>
                <td class="td-manage">
                    <a title="编辑"  onclick="x_admin_show('编辑','/submer/link_sort_add/id/<?php echo e($value->id); ?>',600,400)" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,<?php echo e($value->id); ?>)" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
    <script>
        layui.use('laydate', function(){
    /*用户-删除*/
        function member_del(obj,id){
            if (id > 0) {
                layer.confirm('确认要删除吗？',function(index){
                    $.post("/submerApi/delSort", { id: id },function(data){
                        if (data.status == 'success') {
                            $(obj).parents("tr").remove();
                            layer.msg(data.msg,{icon:1,time:1000});
                        }else{
                            layer.msg(data.msg);
                        }
                    });
                });
            }else{
                layer.msg('请选择内容');
            }
            return false;
        }

        function delAll (argument) {

            var data = tableCheck.getData();

            layer.confirm('确认要删除吗？'+data,function(index){

                if (data == '') {
                    layer.msg('请选择内容');
                    return false;
                }else{
                    $.post("/submerApi/delSort", { id: data },function(e){
                        layer.msg(e.msg, {icon: 1});
                        if (e.status == 'success') {
                            $(".layui-form-checked").not('.header').parents('tr').remove();
                        }
                     });
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>