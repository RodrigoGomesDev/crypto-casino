<?php $__env->startSection('content'); ?>
    <?php if(!empty($slider->slides)): ?>
        <div id="slider" class="carousel slide <?php echo e($slider->animation == 'fade' ? 'carousel-fade' : ''); ?> mb-5" data-ride="carousel" data-interval="<?php echo e($slider->interval * 1000); ?>">
            <?php if($slider->indicators && count($slider->slides) > 1): ?>
                <ol class="carousel-indicators">
                    <?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-target="#slider" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($i==0 ? 'active' : ''); ?>"></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            <?php endif; ?>
            <div class="carousel-inner">
                <?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($i==0 ? 'active' : ''); ?>">
                        <img src="<?php echo e(url($slide->image->url)); ?>" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-3 text-light"><?php echo e($slide->title); ?></h2>
                            <p class="lead mt-4 mb-4 text-light">
                                <?php echo e($slide->subtitle); ?>

                            </p>
                            <?php if($slide->link->url): ?>
                                <a href="<?php echo e(url($slide->link->url)); ?>" class="<?php echo e($slide->link->class); ?>"><?php echo e($slide->link->title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if($slider->controls && count($slider->slides) > 1): ?>
                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo e(__('Previous')); ?></span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo e(__('Next')); ?></span>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div id="call-to-action-blocks" class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?>">
        <div class="row">
            <div class="col-lg-4 mt-3 mb-5">
                <div class="bg-secondary shadow-sm p-3">
                    <h2><?php echo e(__('Free trial')); ?></h2>
                    <p>
                        <?php echo e(__('Sign up and get :x free credits to play and try our casino.', ['x' => config('settings.bonuses.sign_up_credits')])); ?>

                    </p>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('frontend.users.show', auth()->user())); ?>" class="btn btn-primary"><?php echo e(__('My profile')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><?php echo e(__('Sign up')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 mt-3 mb-5">
                <div class="bg-secondary shadow-sm p-3">
                    <h2><?php echo e(__('Crypto deposits')); ?></h2>
                    <p>
                        <?php echo e(__('Make deposits in cryptocurrencies.')); ?>

                        <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'payments')): ?>
                        <?php if(config('settings.bonuses.deposit.amount_pct') > 0): ?>
                            <?php echo e(__('Get :pct% back when you deposit more than :amount credits at once.', [
                                    'amount' => config('settings.bonuses.deposit.amount_min'),
                                    'pct' => config('settings.bonuses.deposit.amount_pct'),
                                ])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                    </p>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('frontend.users.show', auth()->user())); ?>" class="btn btn-primary"><?php echo e(__('My profile')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><?php echo e(__('Sign up')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 mt-3 mb-5">
                <div class="bg-secondary shadow-sm p-3">
                    <h2><?php echo e(__('Referral program')); ?></h2>
                    <p>
                        <?php echo e(__('Refer other people to our casino and get bonuses when they sign up, play games or make deposits.')); ?>

                    </p>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('frontend.users.show', auth()->user())); ?>" class="btn btn-primary"><?php echo e(__('My profile')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><?php echo e(__('Sign up')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> pt-5 pb-5">
        <hr class="bg-primary">
    </div>

    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?>">
        <div class="row">
            <div class="col text-center">
                <h2><?php echo e(__('Play our exciting games')); ?></h2>
            </div>
        </div>
    </div>

    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?>">
        <?php if(!$game_categories->isEmpty()): ?>
            <div class="text-center mt-4">
                <a href="#!" class="btn btn-sm btn-outline-info mr-1 mr-md-3" onclick="filterByCategory('')"><?php echo e(__('All')); ?></a>
                <?php $__currentLoopData = $game_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#!" class="btn btn-sm btn-outline-info mr-1 mr-md-3" onclick="filterByCategory('<?php echo e($category); ?>')"><?php echo e($category); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div id="games-grid" class="row mt-5">
            <?php $__currentLoopData = $game_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 mb-5 game" data-groups='<?php echo e(json_encode($game->categories)); ?>'>
                    <div class="card bg-secondary shadow-sm h-100">
                        <a href="<?php echo e($game->url); ?>">
                            <img src="<?php echo e($game->banner_url); ?>" class="card-img-top" alt="<?php echo e($game->name); ?>">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($game->name); ?></h4>
                            <a href="<?php echo e($game->url); ?>" class="btn btn-primary mt-2"><?php echo e(__('Play')); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <?php if (\Illuminate\Support\Facades\Blade::check('installed', 'raffle')): ?>
    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> pt-3 pb-3">
        <hr class="bg-primary">
    </div>

    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> mt-5 mb-5">
        <div class="row">
            <div class="col text-center mb-3">
                <h2><?php echo e(__('Take part in raffles')); ?></h2>
                <p class="lead my-4">
                    <?php echo e(__('We run raffles for all our users on a regular basis.')); ?>

                    <?php echo e(__('Purchase tickets and win hefty bonuses.')); ?>

                </p>
                <a href="<?php echo e(route('frontend.raffle.index')); ?>" class="btn btn-primary"><?php echo e(__('Purchase tickets')); ?></a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="jumbotron jumbotron-fluid bg-secondary text-info">
        <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> text-center text-lg-left">
            <h2 class="display-4">
                <i class="fas fa-shield-alt"></i>
                <?php echo e(__('Provably fair')); ?>

            </h2>
            <p class="lead">
                <?php echo e(__('Our casino uses provably fair technology, which allows you to verify that each roll or card draw is completely random and you are not being cheated!')); ?>

            </p>
            <div class="mt-5">
                <a href="<?php echo e(url('page/provably-fair')); ?>" class="btn btn-info btn-lg"><?php echo e(__('Learn more')); ?></a>
            </div>
        </div>
    </div>

    <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> mt-5 mb-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="bg-secondary p-4">
                    <h2><?php echo e(__('Recent games')); ?></h2>
                    <?php if(!$games->isEmpty()): ?>
                        <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-md-flex justify-content-between align-items-center">
                                    <div>
                                        <h5><?php echo e($game->title); ?></h5>
                                        <p class="card-text mb-1"><?php echo e($game->gameable->result); ?></p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                <?php echo e(__('Played by')); ?>

                                                <a href="<?php echo e(route('frontend.users.show', $game->account->user)); ?>"><?php echo e($game->account->user->name); ?></a>
                                                <?php echo e($game->created_at->diffForHumans()); ?>

                                            </small>
                                        </p>
                                    </div>
                                    <div class="mt-2 mt-md-0">
                                        <span class="badge badge-primary badge-pill p-2">
                                            <?php echo e(__('Bet :x', ['x' => $game->_bet])); ?>

                                        </span>
                                        <span class="badge badge-primary badge-pill p-2">
                                            <?php echo e(__('Win :x', ['x' => $game->_win])); ?>

                                        </span>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <div>
                            <?php echo e(__('No games were played yet.')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="mt-3">
                        <a href="<?php echo e(route('frontend.history.recent')); ?>" class="btn btn-primary"><?php echo e(__('More recent games')); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img src="<?php echo e(asset('images/home/mac-slots.png')); ?>" class="img-fluid">
            </div>
        </div>
    </div>

    <?php if($top_game): ?>
        <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> pt-3 pb-3">
            <hr class="bg-primary">
        </div>

        <div class="<?php echo e(config('settings.layout') == 'boxed' ? 'container' : 'container-fluid'); ?> mt-5 mb-5">
            <div class="row">
                <div class="col col-lg-6 offset-lg-3 mb-5 text-center">
                    <div class="card text-center border border-primary">
                        <div class="card-header border-bottom border-primary bg-primary">
                            <h2 class="m-0">
                                <i class="fas fa-trophy"></i>
                                <?php echo e(__('Biggest win')); ?>

                            </h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($top_game->title); ?></h5>
                            <p class="card-text">
                                <a href="<?php echo e(route('frontend.users.show', $top_game->account->user)); ?>"><?php echo e($top_game->account->user->name); ?></a>
                                <?php echo e(__('won :x credits', ['x' => $top_game->_win])); ?>

                            </p>
                            <a href="<?php echo e(route('frontend.leaderboard')); ?>" class="btn btn-primary"><?php echo e(__('View leaderboard')); ?></a>
                        </div>
                        <div class="card-footer text-muted border-top border-primary">
                            <?php echo e($top_game->created_at->diffForHumans()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="col mb-5"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    var shuffleInstance = new Shuffle(document.getElementById('games-grid'), {
        itemSelector: '.game'
    });

    function filterByCategory(category) {
        shuffleInstance.filter(category);
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>