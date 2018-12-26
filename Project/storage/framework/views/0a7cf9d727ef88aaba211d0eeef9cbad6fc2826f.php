<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo $title; ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <tr>
                        <td><a href="/posts/create" class = " btn btn-primary">Create an event</a></td>
                        <td><a href="/register" class = " btn btn-primary">Add a User</a></td>
                        <td>
                            <a class = "btn btn-primary" href="<?php echo e(route('logout')); ?>" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?> </a>
                        </td>
                    </tr>                    
                </div>
                <?php if(count($posts) > 0): ?>

                <table class="table table-stripped">
                    <tr>
                        <th>Upcomming Events</th>
                        <th>Event Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->date); ?></td>
                            <td><a href="/posts/<?php echo e($post->id); ?>/edit" class ="btn btn-default">Edit</a></td>
                            <td>
                                <?php echo Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'Post','class' => 'pull-right']); ?>

                                <?php echo e(Form::hidden('_method','DELETE')); ?>

                                <?php echo e(Form::submit('Delete',['class' => 'btn btn-danger'])); ?>

                                <?php echo Form::close(); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            <?php else: ?>
                <p>You Have No Upcomming Events<p>
            <?php endif; ?>

            <?php if(count($reviews) > 0): ?>

            <table class="table table-stripped">
                <tr>
                    <th>Reviews</th>
                    <th>Rating</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($review->title); ?></td>
                        <td><?php echo e($review->rating); ?></td>
                        <td><a href="/reviews/<?php echo e($review->id); ?>/edit" class ="btn btn-default">Edit</a></td>
                        <td>
                            <?php echo Form::open(['action' => ['ReviewsController@destroy',$review->id],'method' => 'Post','class' => 'pull-right']); ?>

                            <?php echo e(Form::hidden('_method','DELETE')); ?>

                            <?php echo e(Form::submit('Delete',['class' => 'btn btn-danger'])); ?>

                            <?php echo Form::close(); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

            <?php else: ?>
                <p>You Have No Reviews<p>
            <?php endif; ?>



            <?php if(count($applicants) > 0): ?>

            <table class="table table-stripped">
                <tr>
                    <th>Applicants</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Event</th>
                </tr>
                <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($applicant->name); ?></td>
                        <td><?php echo e($applicant->number); ?></td>
                        <td><?php echo e($applicant->email); ?></td>
                        <td><?php echo e($applicant->event); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

            <?php else: ?>
                <p>You Have No Applicants<p>
            <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>