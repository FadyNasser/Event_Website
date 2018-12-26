<?php $__env->startSection('content'); ?>
        <h1><?php echo $title; ?></h1>

        <?php if(count($reviews) > 0): ?>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class = "list-group">
                                <li>
                                <h1><a href ="/reviews/<?php echo e($review->id); ?>"> Title :- <?php echo e($review->title); ?></a></h1>
                                <div> Description :- <?php echo $review->description; ?> </div>
                                <h4> rating :- <?php echo $review->rating; ?> </h4>
                                <small>Written on <?php echo e($review->created_at); ?> by <?php echo e($review->name); ?></small>
                                </li>
                                <hr>
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($reviews->links()); ?>

        <?php else: ?>
                <p>No Reviews Found</p>
        <?php endif; ?>

        <div><a href="/reviews/create" class = " btn btn-primary">Add a Review</a></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>