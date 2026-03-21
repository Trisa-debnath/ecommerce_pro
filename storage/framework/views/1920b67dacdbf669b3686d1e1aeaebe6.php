<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

?>

<div>
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Our <span>Products</span></h2>
            </div>

            <div class="row mb-5 py-3 shadow-sm bg-light rounded shadow-sm align-items-center">
                <div class="col-md-5 mb-2 mb-md-0">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-right-0"><i class="fa fa-search"></i></span>
                        <input type="text" wire:model.live="search" class="form-control border-left-0" placeholder="Search for Laptops, Accessories...">
                    </div>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <select wire:model.live="category_id" class="form-control">
                        <option value="">All Categories / Brands</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>
                <div class="col-md-3 text-md-right text-center">
                   <span class="badge badge-info p-2 px-3">Showing <?php echo e($products->count()); ?> Products</span>
                </div>
            </div>

            <div class="row">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box h-100">
                        <div class="option_container">
                            <div class="options">
                                <a href="<?php echo e(route('product.details', $product->id)); ?>" class="option1">
                                    <i class="fa fa-eye"></i> Details
                                </a>
                     <a href="<?php echo e(route('cart')); ?>" wire:click.prevent="addToCart(<?php echo e($product->id); ?>)" class="option2">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <a href="#" class="option1 mt-2 bg-danger text-white">
                                    <i class="fa fa-heart"></i> Wishlist
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
<img src="<?php echo e(asset('uploads/products/' . $product->image)); ?>"
 alt="<?php echo e($product->name); ?>">
                        </div>


<div class="detail-box">
    <h5><?php echo e($product->name); ?></h5>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->discount_percent > 0): ?>
        <h6 style="color: red">
            ৳<?php echo e(number_format($product->discount_price)); ?>

            <br>
            <span style="text-decoration: line-through; color: blue; font-size: 14px;">
                ৳<?php echo e(number_format($product->price)); ?>

            </span>
            <span class="badge badge-success ml-1" style="font-size: 10px;">
                <?php echo e($product->discount_percent); ?>% OFF
            </span>
        </h6>
    <?php else: ?>
        <h6 style="color: blue">৳<?php echo e(number_format($product->price)); ?></h6>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>


                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" width="100" alt="No Product">
                    <h4 class="mt-3 text-muted">No products found matching your search.</h4>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="d-flex justify-content-center mt-4 p-pagination">
                <?php echo e($products->links()); ?>

            </div>

            <div class="btn-box">
                <a href="">View All Products</a>
            </div>
        </div>
    </section>
</div>

<style>

    .p-pagination svg { width: 20px; }
    .p-pagination nav div:first-child { display: none; }
    .product_section .box { transition: all 0.3s ease; border-radius: 10px; overflow: hidden; }
    .product_section .box:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
</style><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/product.blade.php ENDPATH**/ ?>