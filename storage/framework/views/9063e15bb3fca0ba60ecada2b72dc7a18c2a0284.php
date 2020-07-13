

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Chat')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <chat :user="<?php echo e(json_encode(['id' => auth()->user()->id, 'name' => auth()->user()->name])); ?>"></chat>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>