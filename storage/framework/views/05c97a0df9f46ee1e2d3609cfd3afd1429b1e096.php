<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo List</div>

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

                    <!----List task----->
                <div class="list-task">
                    <?php if(count($data)>0): ?>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>Task Name</th>
                                <th>Action</th>

                                </tr>
                            </thead>

                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr>
                                    <td>
                                        <?php if($datas->completed == 1): ?>
                                            <s><?php echo e($datas->task_name); ?></s>
                                            <?php else: ?>
                                            <?php echo e($datas->task_name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($datas->completed != 1): ?>
                                            <a href ="<?php echo e(url('/complete-task/'.$datas->task_id)); ?>" class="btn btn-primary btn-xs" title="Mark as Completed"><span class="glyphicon glyphicon-ok"></span> Completed</a>
                                            <a href="/edit-task/<?php echo e($datas->task_id); ?>" class="btn btn-primary btn-xs" title="Edit Task"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        <?php endif; ?>

                                        <?php echo Form::open(['method'=>'DELETE','url' => ['delete-task', $datas->task_id],
                                        'style' => 'display:inline']); ?>

                                        <?php echo Form::button(' Delete', array('type' => 'submit','class' => 'btn btn-danger btn-xs glyphicon glyphicon-trash',
                                                            'title' => 'Delete Task','onclick'=>'return confirm("Do you want to delete this Task?")')); ?>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($data->links()); ?>

                        </table>
                    <?php endif; ?>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary" id="addList">
                        <i class="glyphicon glyphicon-plus-sign"></i> Add
                    </button>
                    
                </div>
                <div id="addNew" style="display:none;">
                    <?php echo Form::open(['url' => '/add-task','autocomplete' => 'off']); ?>

                        <div class="form-group ">
                            <?php echo Form::text('task_name', null, ['class' => 'form-control ','id'=>'task_name', 'placeholder' => 'Add new task']); ?>

                        </div>
                        <div class="form-group ">
                            <?php echo e(Form::submit('Add Task',['class'=>'btn btn-primary'])); ?>

                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-script'); ?>
    <script>
        $(document).ready(function(){

            $("#addList").click(function(){
                $("#addNew").slideToggle();
                $("#addList").hide();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>