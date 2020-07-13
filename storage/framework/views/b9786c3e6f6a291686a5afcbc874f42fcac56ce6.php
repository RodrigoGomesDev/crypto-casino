

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Change password')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('frontend.users.password.update', $user)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label><?php echo e(__('Current password')); ?></label>
            <input type="password" name="current_password" class="form-control <?php echo e($errors->has('current_password') ? 'is-invalid' : ''); ?>" placeholder="<?php echo e(__('Current password')); ?>" value="<?php echo e(old('current_password')); ?>" required>
        </div>

        <div class="form-group">
            <label><?php echo e(__('New password')); ?></label>
            <input type="password" name="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" required>
        </div>

        <div class="form-group">
            <label><?php echo e(__('Repeat password')); ?></label>
            <input type="password" name="password_confirmation" class="form-control <?php echo e($errors->has('password_confirmation') ? 'is-invalid' : ''); ?>" placeholder="<?php echo e(__('Repeat password')); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <?php echo e(__('Save')); ?>

        </button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>