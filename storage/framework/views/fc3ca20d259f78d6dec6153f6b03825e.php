<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;

?>

<div class="py-12 bg-gray-50">

    <div class="container">
        <div class="font-weight-bold mb-3" style="font-size:2.6rem;
         color: #002c3e; mb-3 ml-3;">
                 <?php echo e($product->name); ?> Details </div>
        <div class="row bg-white p-4 shadow-sm rounded">
            <div class="col-md-6 d-flex align-items-center justify-center">
                <div class="img-box p-3 border rounded w-100 text-center bg-light">
                    <img src="<?php echo e(asset('uploads/products/' . $product->image)); ?>"
                         alt="<?php echo e($product->name); ?>"
                         class="img-fluid"
                         style="max-height: 450px; object-fit: contain;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="detail-box px-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mb-2">
                            <li class="breadcrumb-item text-danger uppercase small font-weight-bold"><?php echo e($product->category->name); ?></li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->subcategory): ?>
                                <li class="breadcrumb-item small font-weight-bold"><?php echo e($product->subcategory->name); ?></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ol>
                    </nav>

                    <h1 class="font-weight-bold mb-3" style="font-size: 2.5rem; color: #002c3e;">
                        <?php echo e($product->name); ?>

                    </h1>

                    <div class="price_box mb-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->discount_percent > 0): ?>
                            <h3 class="text-danger font-weight-bold mb-0">
                                $<?php echo e(number_format($product->discount_price, 2)); ?>

                                <small class="text-muted ml-2 font-weight-normal" style="text-decoration: line-through; font-size: 1.2rem;">
                                    $<?php echo e(number_format($product->price, 2)); ?>

                                </small>
                            </h3>
                            <span class="badge badge-danger px-2 py-1 mt-1"><?php echo e($product->discount_percent); ?>% OFF</span>
                        <?php else: ?>
                            <h3 class="text-danger font-weight-bold mb-0">
                                $<?php echo e(number_format($product->price, 2)); ?></h3>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h6 class="font-weight-bold text-uppercase">Description</h6>
                        <p class="text-muted" style="line-height: 1.7;">
                            <?php echo e($product->description); ?>

                        </p>
                    </div>

                    <div class="mb-4">
                 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->quantity > 0): ?>
                <p class="text-success font-weight-bold"><i class="fa fa-check-circle">
                    </i> In Stock (<?php echo e($product->quantity); ?> items left)</p>
            <?php else: ?>
            <p class="text-danger font-weight-bold"><i class="fa fa-times-circle">
                </i> Out of Stock</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <div class="quantity_selector d-flex border rounded mr-3 mb-2" style="height: 48px;">
                            <button wire:click="decrement" class="btn btn-light px-3" style="border-radius: 0;">-</button>
                            <span class="px-4 d-flex align-items-center font-weight-bold bg-white"><?php echo e($quantity); ?></span>
                            <button wire:click="increment" class="btn btn-light px-3" style="border-radius: 0;">+</button>
                        </div>

                        <button wire:click="addToCart"
                                <?php if($product->quantity <= 0): ?> disabled <?php endif; ?>
                                class="btn btn-danger px-5 mb-2"
                                style="height: 48px; border-radius: 25px; font-weight: bold; background-color: #f7444e;">
                            ADD TO CART
                        </button>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
                        <div class="alert alert-success mt-3 shadow-sm border-0">
                            <i class="fa fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/product-details.blade.php ENDPATH**/ ?>