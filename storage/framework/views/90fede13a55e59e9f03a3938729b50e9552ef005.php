<footer class="footer border-top border-primary">
    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?>">
        <div class="row">
            <div class="col text-center text-lg-left">
                <span class="text-muted">&copy; <?php echo e(__('Crypto Casino')); ?> <?php echo e(__('v.')); ?><?php echo e(config('app.version')); ?></span>
            </div>
        </div>
    </div>
</footer>
