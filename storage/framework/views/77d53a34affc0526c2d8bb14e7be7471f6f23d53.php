<?php $__env->startSection('title'); ?>
    <?php echo e(__('Provably fair')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e(__('Slots')); ?></h2>
    <?php echo $__env->make('game-slots::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-heads-or-tails')): ?>
        <h2 class="mt-4"><?php echo e(__('Heads or Tails')); ?></h2>
        <?php echo $__env->make('game-heads-or-tails::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-dice')): ?>
        <h2 class="mt-4"><?php echo e(__('Dice')); ?></h2>
        <?php echo $__env->make('game-dice::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-dice-3d')): ?>
        <h2 class="mt-4"><?php echo e(__('Dice 3D')); ?></h2>
        <?php echo $__env->make('game-dice-3d::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-video-poker')): ?>
        <h2 class="mt-4"><?php echo e(__('Card games')); ?></h2>
        <?php echo $__env->make('game-video-poker::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-roulette')): ?>
        <h2 class="mt-4"><?php echo e(__('Roulette')); ?></h2>
        <?php echo $__env->make('game-roulette::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-american-bingo')): ?>
        <h2 class="mt-4"><?php echo e(__('Bingo')); ?></h2>
        <?php echo $__env->make('game-american-bingo::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'game-keno')): ?>
        <h2 class="mt-4"><?php echo e(__('Keno')); ?></h2>
        <?php echo $__env->make('game-keno::frontend.pages.verify-description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>