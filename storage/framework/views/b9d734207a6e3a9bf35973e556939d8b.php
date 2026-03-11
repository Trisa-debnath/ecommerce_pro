<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="shortcut icon" href="<?php echo e(asset('home/images/favicon.png')); ?>" type="">
    <title>Product Details - Famms</title>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('home/css/bootstrap.css')); ?>" />
    <link href="<?php echo e(asset('home/css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('home/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('home/css/responsive.css')); ?>" rel="stylesheet" />
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="sub_page">
    <div class="hero_area">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('home.header', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4093718799-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
    </div>

    <main>
        <?php echo e($slot); ?> </main>

    <?php echo $__env->make('home.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script src="<?php echo e(asset('home/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/custom.js')); ?>"></script>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH D:\ecommerce_pro\resources\views/home/shop_layout.blade.php ENDPATH**/ ?>