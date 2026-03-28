<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

?>

<div>
    
    <section class="inner_page_head" style="background: #f7444e; color: white;
    padding:8px 0; text-align: center;">
        <div class="container">
            <h5>#NewArrivals</h5>
            <p>Check out our latest collection of electronic gadgets!</p>
        </div>
    </section>

    <section id="new_arrivals_page" class="product_section layout_padding">
        <div class="container">

            
            <div class="row mb-4 py-2 shadow-sm bg-light rounded align-items-center mx-0 border">
                <div class="col-md-5 mb-2 mb-md-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-right-0">
                                <i class="fa fa-search text-muted"></i></span>
                        </div>
                        <input type="text" wire:model.live="search" class="form-control border-left-0" placeholder="Search new products...">
                    </div>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <select wire:model.live="category_id" class="form-control">
                        <option value="">All Categories</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>
                <div class="col-md-3 text-md-right text-center">
                    <span class="badge badge-danger p-2 px-3">Latest: <?php echo e($products->total()); ?> Items</span>
                </div>
            </div>

            
            <div class="row">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                    <div class="box h-100 shadow-sm">
                        <div class="option_container">
                            <div class="options">
                                <a href="<?php echo e(route('product.details', $product->id)); ?>" class="option1">
                                    <i class="fa fa-eye"></i> Details
                                </a>
                                <a href="javascript:void(0)" wire:click.prevent="addToCart(<?php echo e($product->id); ?>)" class="option2">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="<?php echo e(asset('uploads/products/' . $product->image)); ?>" onerror="this.src='https://via.placeholder.com/200'" alt="<?php echo e($product->name); ?>">
                        </div>
                        <div class="detail-box">
                            <h5><?php echo e($product->name); ?></h5>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->discount_percent > 0): ?>
                                <h6 class="text-danger">
                                    ৳<?php echo e(number_format($product->discount_price)); ?>

                                    <br>
                                    <small style="text-decoration: line-through; color: #999;">৳<?php echo e(number_format($product->price)); ?></small>
                                    <span class="badge badge-success ml-1" style="font-size: 10px;"><?php echo e($product->discount_percent); ?>% OFF</span>
                                </h6>
                            <?php else: ?>
                                <h6 class="text-primary">৳<?php echo e(number_format($product->price)); ?></h6>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" width="80" alt="No Product">
                    <h4 class="mt-3 text-muted">No new arrivals found matching "<?php echo e($search); ?>"</h4>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="d-flex justify-content-center mt-4 custom-pagination">
                <?php echo e($products->links()); ?>

            </div>

        </div>
    </section>
</div>

<style>
    .custom-pagination svg { width: 20px; }
    .custom-pagination nav div:first-child { display: none; }

    .product_section .box {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #eee;
    }
    .product_section .box:hover {
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        border-color: #f7444e;
    }
    .inner_page_head h3 {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/new-arrivals.blade.php ENDPATH**/ ?>