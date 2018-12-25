<?php $__env->startSection('content'); ?>
    <a href="/reviews" class =" btn btn-default">Go Back</a>
    <h1><?php echo e($review->title); ?></h1>
    
    <div>
        <?php echo $review->description; ?>

    </div>

    <hr>
    

    <small>Written on <?php echo e($review->created_at); ?> by <?php echo e($review->name); ?></small>
    
    <hr>

    <?php if(!Auth::guest()): ?>

        <?php if(auth()->user()->Type == 3): ?>
            <a href="/reviews/<?php echo e($review->id); ?>/edit" class="btn btn-default">Edit</a>
            
            <?php echo Form::open(['action' => ['PostsController@destroy',$review->id],'method' => 'Post','class' => 'pull-right']); ?>

                <?php echo e(Form::hidden('_method','DELETE')); ?>

                <?php echo e(Form::submit('Delete',['class' => 'btn btn-danger'])); ?>

            <?php echo Form::close(); ?>

        <?php endif; ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>