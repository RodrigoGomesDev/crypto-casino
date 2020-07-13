

<?php $__env->startSection('title'); ?>
    <?php echo e(__('License registration')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('backend.license.register')); ?>">
        <?php echo csrf_field(); ?>
        <?php if(!env('PURCHASE_CODE') || !env('LICENSEE_EMAIL')): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo e(__('Please register your license to continue using the application.')); ?>

            </div>
        <?php endif; ?>
        <div class="form-group">
            <label><?php echo e(__('Purchase code')); ?></label>
            <input type="text" name="code" class="form-control" value="<?php echo e(old('code', env('PURCHASE_CODE'))); ?>" required>
        </div>
        <div class="form-group">
            <label><?php echo e(__('License holder (licensee) email')); ?></label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', env('LICENSEE_EMAIL'))); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Register')); ?></button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>