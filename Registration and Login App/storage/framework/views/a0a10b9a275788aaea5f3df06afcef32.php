

  

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

  

                <div class="card-body">

                    <?php if(session('success')): ?>

                        <div class="alert alert-success" role="alert">

                            <?php echo e(session('success')); ?>


                        </div>

                    <?php endif; ?>

  

                    You are Logged In

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alano\login\resources\views/dashboard.blade.php ENDPATH**/ ?>