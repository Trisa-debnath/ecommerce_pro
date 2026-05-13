<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('admin.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <style>
        /* Wrapper for full height */
        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Content wrapper spacing according to sidebar and navbar */
        .content-wrapper {
            flex: 1;
            margin-left: 250px; /* default sidebar width */
            padding-top: 70px; /* navbar height */
            transition: margin-left 0.3s ease;
        }

        /* Sidebar collapsed (Quantum Able adds class 'sidebar-collapsed') */
        .sidebar-collapsed ~ .content-wrapper {
            margin-left: 80px;
        }

        /* Footer styling */
        .admin-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e0e0e0;
            width: 100%;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .content-wrapper {
                margin-left: 0;
                padding: 20px 15px;
            }

            .admin-footer {
                font-size: 0.85rem;
                padding: 10px 0;
            }
        }
    </style>
</head>

<body class="sidebar-mini fixed">
   <!-- <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>-->

    <div class="wrapper">
        <!-- Navbar -->
        <?php echo $__env->make('admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Sidebar -->
        <aside class="main-sidebar hidden-print">
            <section class="sidebar" id="sidebar-scroll">
                <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </section>
        </aside>

        <!-- Sidebar chat -->
        <?php echo $__env->make('admin.chat', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Main content -->
        <div class="content-wrapper">

             <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="alert alert-success mt-3"><?php echo e(session('success')); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php echo $__env->yieldContent('admin_layout'); ?>


        </div>


        <footer class="admin-footer">
            &copy; <?php echo e(date('Y')); ?> <strong>Ecommerce Pro Admin</strong>. All Rights Reserved.
        </footer>

        <!-- Store shortcut -->
        <div class="fixed-button">
            <a href="<?php echo e(route('home.index')); ?>" class="btn btn-md btn-primary" target="_blank">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> View Store
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <?php echo $__env->make('admin.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH D:\ecommerce_pro\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>