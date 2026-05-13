<ul class="sidebar-menu">
    <li class="nav-level">--- Ecommerce Pro</li>

    <li class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
        <a class="waves-effect waves-dark" href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="icon-speedometer"></i><span> Dashboard</span>
        </a>
    </li>

    <li class="nav-level">--- Catalog</li>

    <li class="treeview <?php echo e(request()->routeIs('admin.category.*') ? 'active' : ''); ?>">
        <a class="waves-effect waves-dark" href="#!">
            <i class="icon-folder"></i><span> Categories</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('admin.category.create')); ?>">
                    <i class="icon-arrow-right"></i> Add Category
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('admin.category.manage')); ?>">
                    <i class="icon-arrow-right"></i> Manage Categories
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview <?php echo e(request()->routeIs('admin.subcategory.*') ? 'active' : ''); ?>">
        <a class="waves-effect waves-dark" href="#!">
            <i class="icon-layers"></i><span> Subcategories</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('admin.subcategory.create')); ?>">
                    <i class="icon-arrow-right"></i> Add Subcategory
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('admin.subcategory.manage')); ?>">
                    <i class="icon-arrow-right"></i> Manage Subcategories
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview <?php echo e(request()->routeIs('admin.product.*') ? 'active' : ''); ?>">
        <a class="waves-effect waves-dark" href="#!">
            <i class="icon-bag"></i><span> Products</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('admin.product.create')); ?>">
                    <i class="icon-arrow-right"></i> Add Product
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('admin.product.manage')); ?>">
                    <i class="icon-arrow-right"></i> Manage Products
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-level">--- Sales</li>

    <li class="<?php echo e(request()->routeIs('admin.orders*') ? 'active' : ''); ?>">
        <a class="waves-effect waves-dark" href="<?php echo e(route('admin.orders')); ?>">
            <i class="icon-basket-loaded"></i><span> Orders</span>
        </a>
    </li>

    <li class="nav-level">--- Content</li>

    <li class="treeview <?php echo e(request()->routeIs('testimonials.*') ? 'active' : ''); ?>">
        <a class="waves-effect waves-dark" href="#!">
            <i class="icon-speech"></i><span> Testimonials</span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('testimonials.index')); ?>">
                    <i class="icon-arrow-right"></i> Manage Testimonials
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?php echo e(route('testimonials.create')); ?>">
                    <i class="icon-arrow-right"></i> Add Testimonial
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-level">--- Store</li>

    <li>
        <a class="waves-effect waves-dark" href="<?php echo e(route('home.index')); ?>" target="_blank">
            <i class="icon-globe"></i><span> View Store</span>
        </a>
    </li>
</ul>
<?php /**PATH D:\ecommerce_pro\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>