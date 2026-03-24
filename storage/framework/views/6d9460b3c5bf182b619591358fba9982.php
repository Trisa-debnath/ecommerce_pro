<div>
    <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="<?php echo e(route('home.index')); ?>"><img width="250"
                     src="home/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">


             <li class="nav-item <?php echo e(request()->routeIs('home.index') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('home.index')); ?>">Home</a>
    </li>
                     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span class="nav-label">Pages <span class="caret"></span></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo e(route('about')); ?>">About</a></li>
            <li><a href="<?php echo e(route('testimonial')); ?>">Testimonial</a></li>
        </ul>
    </li>
                       <li class="nav-item <?php echo e(request()->routeIs('home.products') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('home.index')); ?>#our_products">Products</a>
    </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>

                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>


<li class="nav-item ml-2">
    <a class="nav-link position-relative" href="/cart" style="display: flex; align-items: center;">
    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('cart') && count(session('cart')) > 0): ?>

    <span class="badge badge-danger position-absolute"
     style="top: 0; right: -5px; border-radius: 50%; padding: 2px 6px; font-size: 10px;">

            <?php echo e(count((array) session('cart'))); ?>

                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </a>
                        </li>


     <li class="nav-item d-flex align-items-center ml-3">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('login')): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <!-- Logout -->
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-primary mr-2">
                  Logout
                </button>
            </form>
        <?php else: ?>
            <!-- Login -->
            <a href="<?php echo e(route('login')); ?>" class="btn btn-success mr-2">
               Login
            </a>

            <!-- Register -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-info mr-2">
                   Register
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</li>



                     </ul>
                  </div>
               </nav>
            </div>
         </header>

</div><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/header.blade.php ENDPATH**/ ?>