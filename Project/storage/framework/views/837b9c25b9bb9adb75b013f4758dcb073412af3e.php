<?php $__env->startSection('content'); ?>
        <h1>Posts</h1>

        <?php if(count($posts) > 0): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class = "list-group">
                                <h1><a href ="/posts/<?php echo e($post->id); ?>"> Title :- <?php echo e($post->title); ?></a></h1>
                                <h4> Date :- <?php echo $post->date; ?> </h4>
                                <div> Description :- <?php echo $post->body; ?> </div>
                                
                                <hr>
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($posts->links()); ?>

        <?php else: ?>
                <p>No Posts Found</p>
        <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>