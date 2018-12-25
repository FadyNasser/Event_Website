<?php $__env->startSection('content'); ?>
        <h1><?php echo e($title); ?></h1>
        <p>This is the about page </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>