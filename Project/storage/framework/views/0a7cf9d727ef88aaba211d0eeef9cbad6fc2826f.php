<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <tr>
                        <td><a href="/posts/create" class = " btn btn-primary">Create an event</a></td>
                        <?php if($Type == 3): ?>
                            <td><a href="/register" class = " btn btn-primary">Add a User</a></td>
                        <?php endif; ?>
                        <td><a class = "btn btn-primary" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a></td>
                    </tr>                    
                </div>
                <?php if(count($posts) > 0): ?>

                <table class="table table-stripped">
                    <tr>
                        <th>Your Blog Posts</th>
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
                <p>You Have No Posts<p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>