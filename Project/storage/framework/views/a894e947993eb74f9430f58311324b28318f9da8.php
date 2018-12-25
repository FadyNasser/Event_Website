<?php $__env->startSection('content'); ?>
    
    <h1>Create Post</h1>

    <?php echo Form::open(['action'=>'PostsController@store','method'=>'POST']); ?>

        <div class = "form-group">
            <?php echo e(Form::label('title','Title')); ?>

            <?php echo e(Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])); ?>

        </div>

        <div class = "form-group">
                <?php echo e(Form::label('date','Date')); ?>

                <?php echo e(Form::text('date','',['class' => 'form-control','placeholder' => 'Date in form YYYY-MM-DD'])); ?>

        </div>

        <div class = "form-group">
                <?php echo e(Form::label('body','Description')); ?>

                <?php echo e(Form::textarea('body','',['id'=> 'article-ckeditor','class' => 'form-control','placeholder' => 'Body Text'])); ?>

        </div>
        <?php echo e(Form::submit('Submit',['class' => 'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>