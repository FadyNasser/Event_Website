<?php $__env->startSection('content'); ?>
    <a href="/posts" class =" btn btn-default">Go Back</a>
    <h1><?php echo e($post->title); ?></h1>
    
    <div>
        <?php echo $post->body; ?>

    </div>

    <hr>
    

    <small>Written on <?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></small>
    
    <hr>

    <?php if(!Auth::guest()): ?>

        <?php if(Auth::user()->id == $post->user_id || auth()->user()->Type == 3): ?>
            <a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-default">Edit</a>
            
            <?php echo Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'Post','class' => 'pull-right']); ?>

                <?php echo e(Form::hidden('_method','DELETE')); ?>

                <?php echo e(Form::submit('Delete',['class' => 'btn btn-danger'])); ?>

            <?php echo Form::close(); ?>

        <?php endif; ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>