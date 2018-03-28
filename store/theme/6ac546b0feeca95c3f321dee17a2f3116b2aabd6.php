<?php $__env->startSection('content'); ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($value['type'] == 1): ?>
                <div class="item item-0" id="<?php echo e($value['code']); ?>">
                    <?php if($loop->index == 0): ?>
                        <?php echo $__env->make('index.mune', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <h2><a href="/#<?php echo e($value['code']); ?>"><?php echo e($value['title']); ?></a></h2>
                    <ul class="xoxo blogroll">
                        <?php $__currentLoopData = $value['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($vu['link']); ?>" target="_blank"><?php echo e($vu['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($value['type'] == 0): ?>
                <div class="item item-0" id="<?php echo e($value['code']); ?>">
                    <?php if($loop->index == 0): ?>
                        <?php echo $__env->make('index.mune', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <h2><a href="/#<?php echo e($value['code']); ?>"><?php echo e($value['title']); ?></a></h2>
                    <ul class="xoxo blogroll">
                        <?php $__currentLoopData = $value['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($vu['link']); ?>" target="_blank"><?php echo e($vu['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="application/javascript">
    $(function(){var source=document.referrer;if(source!=''){$.post("/Api/getSource",{url:source},function(data){})}});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>