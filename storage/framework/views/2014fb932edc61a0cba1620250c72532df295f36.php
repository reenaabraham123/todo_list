<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </div>
                        <?php endif; ?>
                        <div class="list-task">
                            <div id="addNew">
                                <?php echo Form::open(['url' => ['update-task',$list[0]->task_id]]); ?>

                                <div class="form-group ">
                                    <input type="hidden" name="task_id" value="<?php echo e($list[0]->task_id); ?>">
                                    <?php echo Form::text('task_name', $list[0]->task_name, ['class' => 'form-control ','id'=>'task_name']); ?>

                                </div>
                                <div class="form-group ">
                                    <?php echo e(Form::submit('Edit Task',['class'=>'btn btn-primary'])); ?>

                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>