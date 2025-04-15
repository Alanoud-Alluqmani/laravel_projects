

<?php $__env->startSection('content'); ?>
<h1 class="text-center">To Do List</h1>

            
<form method="POST" action="<?php echo e(route('tasks.store')); ?>" >
    <?php echo csrf_field(); ?>
    <div class="input-group">
        <input type="text" name="title" class="form-control" placeholder="Add a new task">
        <button type="submit" class="btn btn-primary">Add Task</button>
    </div>
</form>


<ul class="list-group">
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">

        
        <form method="POST" action="<?php echo e(route('tasks.update', $task)); ?>"  class="d-flex align-items-center w-100">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="text" name="title" value="<?php echo e($task->title); ?>" class="form-control me-2" required>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </form>
            
            
            <form method="POST" action="<?php echo e(route('tasks.delete', $task)); ?>"  style="margin-left: 10px;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alano\todo-app\resources\views/tasks/index.blade.php ENDPATH**/ ?>