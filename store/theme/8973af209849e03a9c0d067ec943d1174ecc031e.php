<?php $__env->startSection('content'); ?>
    <div class="x-body">
        <blockquote class="layui-elem-quote">欢迎使用x-admin 后台模版！</blockquote>
        <fieldset class="layui-elem-field">
            <legend>信息统计</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-even>
                    <thead>
                    <tr>
                        <th>统计</th>
                        <th>链接</th>
                        <th>订阅</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>总数</td>
                        <td><?php echo e($data['countlink']); ?></td>
                        <td><?php echo e($data['countsub']); ?></td>
                    </tr>
                    <tr>
                        <td>今日</td>
                        <td><?php echo e($data['daylink']); ?></td>
                        <td><?php echo e($data['daysub']); ?></td>
                    </tr>
                    <tr>
                        <td>本月</td>
                        <td><?php echo e($data['yuelink']); ?></td>
                        <td><?php echo e($data['yuesub']); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>