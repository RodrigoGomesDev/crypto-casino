<?php $__env->startSection('title'); ?>
    <?php echo e(__('Bonuses')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e(__('Referral program')); ?></h2>
    <p>
        <?php echo e(__('Refer your friends to our casino and get bonus credits.')); ?>

        <?php echo e(__('Please copy the link below and share with your friends.')); ?>

    </p>
    <div class="input-group mb-3">
        <input id="referral-link-input" type="text" class="form-control text-muted" value="<?php echo e($referral_url); ?>" readonly>
        <div class="input-group-append">
            <button type="button" class="btn btn-primary" onclick="copyToClipboard(document.getElementById('referral-link-input'))"><i class="far fa-copy"></i> <?php echo e(__('Copy')); ?></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="mailto:?subject=<?php echo e(urlencode($share_subject)); ?>&body=<?php echo e(urlencode($share_body)); ?>">
                    <?php echo e(__('Send by email')); ?>

                </a>
                <a class="dropdown-item" href="https://web.whatsapp.com/send?text=<?php echo e(urlencode($share_subject) . ':' . urlencode($referral_url)); ?>">
                    <?php echo e(__('Send by WhatsApp')); ?>

                </a>
                <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u=<?php echo e(urlencode($referral_url)); ?>">
                    <?php echo e(__('Share on Facebook')); ?>

                </a>
                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($referral_url)); ?>&text=<?php echo e(urlencode($share_subject)); ?>">
                    <?php echo e(__('Share on Twitter')); ?>

                </a>
            </div>
        </div>
    </div>
    <p>
        <?php echo e(__('You will get the following bonuses for referred users.')); ?>

    </p>
    <ul>
        <?php if($referral_bonuses['referrer_sign_up_credits']): ?>
            <li>
                <?php echo e(__('User signs up - :n credits', ['n' => $referral_bonuses['referrer_sign_up_credits']])); ?>

                <?php if(config('settings.bonuses.referral.referee_sign_up_credits')): ?>
                    (<?php echo e(__('referred user will also get :n bonus credits', ['n' => $referral_bonuses['referee_sign_up_credits']])); ?>)
                <?php endif; ?>
            </li>
        <?php endif; ?>
        <?php if($referral_bonuses['referrer_game_loss_pct']): ?>
            <li>
                <?php echo e(__('User loses a game - :n% of net loss in credits', ['n' => $referral_bonuses['referrer_game_loss_pct']])); ?>

            </li>
        <?php endif; ?>
        <?php if($referral_bonuses['referrer_game_win_pct']): ?>
            <li>
                <?php echo e(__('User wins a game - :n% of net win in credits', ['n' => $referral_bonuses['referrer_game_win_pct']])); ?>

            </li>
        <?php endif; ?>
        <?php if($referral_bonuses['referrer_raffle_ticket_pct']): ?>
            <li>
                <?php echo e(__('User purchases a raffle ticket - :n% of ticket price in credits', ['n' => $referral_bonuses['referrer_raffle_ticket_pct']])); ?>

            </li>
        <?php endif; ?>
        <?php if($referral_bonuses['referrer_deposit_pct']): ?>
            <li>
                <?php echo e(__('User completes a deposit - :n% of deposit amount in credits', ['n' => $referral_bonuses['referrer_deposit_pct']])); ?>

            </li>
        <?php endif; ?>
    </ul>
    <p>
        <?php echo e(__('You referred :n users and earned :total credits so far.', ['n' => $referred_users_count, 'total' => $referral_total_bonus])); ?>

    </p>
    <h2 class="mt-4"><?php echo e(__('Other bonuses')); ?></h2>
    <ul>
        <?php if(config('settings.bonuses.game.loss_amount_pct') > 0): ?>
            <li>
                <?php echo e(__('Get :pct% of the net loss back when you lose more than :amount credits in a single game.', [
                        'amount' => config('settings.bonuses.game.loss_amount_min'),
                        'pct' => config('settings.bonuses.game.loss_amount_pct'),
                    ])); ?>

            </li>
        <?php endif; ?>
        <?php if(config('settings.bonuses.game.win_amount_pct') > 0): ?>
            <li>
                <?php echo e(__('Get :pct% of the net win back when you win more than :amount credits in a single game.', [
                        'amount' => config('settings.bonuses.game.win_amount_min'),
                        'pct' => config('settings.bonuses.game.win_amount_pct'),
                    ])); ?>

            </li>
        <?php endif; ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'payments')): ?>
            <?php if(config('settings.bonuses.deposit.amount_pct') > 0): ?>
                <li>
                    <?php echo e(__('Get :pct% back when you deposit more than :amount credits at once.', [
                            'amount' => config('settings.bonuses.deposit.amount_min'),
                            'pct' => config('settings.bonuses.deposit.amount_pct'),
                        ])); ?>

                </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(mix('js/bonuses.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>