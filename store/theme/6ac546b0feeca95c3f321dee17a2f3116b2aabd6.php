<?php $__env->startSection('content'); ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="application/javascript">
    eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(1(){4 0=2.3;9(0!=\'\'){$.5("/6/7",{8:0},1(a){})}});',11,11,'b|function|document|referrer|var|post|Api|getSource|url|if|'.split('|'),0,{}))
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>