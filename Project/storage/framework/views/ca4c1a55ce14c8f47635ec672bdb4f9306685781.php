<?php $__env->startSection('content'); ?>
    <a href="/posts" class =" btn btn-default">Go Back</a>
    <h1> Event Title :- <?php echo e($post->title); ?></h1>
    <h2> Event ID :- <?php echo e($post->id); ?></h2>
    
    <div>
        <?php echo $post->body; ?>

    </div>

    <hr>
    
    <small>Written on <?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></small>
    
    <hr>

    <?php if(auth()->guard()->guest()): ?>
        <div><a href="/apply" class = " btn btn-primary">Apply Now</a></div>
    <?php endif; ?>

    <?php if(!Auth::guest()): ?>

        <?php if(auth()->user()->Type != 1): ?>
            <a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-default">Edit</a>
        <?php endif; ?>
        <?php if(auth()->user()->Type == 3): ?>    
            <?php echo Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'Post','class' => 'pull-right']); ?>

                <?php echo e(Form::hidden('_method','DELETE')); ?>

                <?php echo e(Form::submit('Delete',['class' => 'btn btn-danger'])); ?>

            <?php echo Form::close(); ?>

        <?php endif; ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>