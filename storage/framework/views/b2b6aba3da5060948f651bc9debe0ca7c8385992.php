

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Enable two-factor authentication')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p><?php echo e(__('Open Google Authenticator app on your mobile phone.')); ?></p>
    <p><?php echo e(__('Scan the below QR code with the authenticator app.')); ?></p>
    <p><?php echo e(__('After that input the one-time password that you see on the screen to complete the process.')); ?></p>
    <div class="my-3">
        <?php echo $qr; ?>

    </div>
    <form method="POST" action="<?php echo e(route('frontend.security.2fa.enable')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="secret" value="<?php echo e(old('secret', $secret)); ?>">
        <div class="form-group">
            <label><?php echo e(__('One-time password')); ?></label>
            <input type="text" name="totp" class="form-control" required autofocus>
            <small><?php echo e(__('Input one-time password that you currently see in the Google Authenticator app.')); ?></small>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Complete')); ?></button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>