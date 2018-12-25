<?php $__env->startSection('content'); ?>
    
    <h1>Add Review</h1>

    <?php echo Form::open(['action'=>'ReviewsController@store','method'=>'POST']); ?>

        <div class = "form-group">
            <?php echo e(Form::label('title','Title')); ?>

            <?php echo e(Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])); ?>

        </div>

        <div class = "form-group">
                <?php echo e(Form::label('name','Name')); ?>

                <?php echo e(Form::text('name','',['class' => 'form-control','placeholder' => 'Enter your Name (Optional)'])); ?>

        </div>

        <div class = "form-group">
                <?php echo e(Form::label('description','Description')); ?>

                <?php echo e(Form::textarea('description','',['id'=> 'article-ckeditor','class' => 'form-control','placeholder' => 'Write your opinion'])); ?>

        </div>

        <div class="form-group ">
                <?php echo e(Form::label('rating','Rating')); ?>

                <?php echo e(Form::text('rating','',['class' => 'form-control','placeholder' => 'Enter a number form 1 to 5 (5 for highest rating)'])); ?>

        </div>
        <?php echo e(Form::submit('Submit',['class' => 'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>