<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

?>

<div class="container py-5">
    <h2 class="text-center mb-5 font-weight-bold">Your Shopping Cart</h2>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('cart') && count(session('cart')) > 0): ?>
                <div class="table-responsive bg-white shadow-sm p-3 rounded">
                    <table class="table table-hover border">
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0 ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <?php $total += $details['price'] * $details['quantity'] ?>
    <tr>
     <td>
    <div class="d-flex align-items-center">
    <img src="<?php echo e(asset('uploads/products/'.$details['image'])); ?>"
     width="50" class="mr-3 rounded">
    <span class="font-weight-bold"><?php echo e($details['name']); ?></span>
     </div>
    </td>
        <td>$<?php echo e(number_format($details['price'], 2)); ?></td>
            <td><?php echo e($details['quantity']); ?></td>
            <td>$<?php echo e(number_format($details['price'] * $details['quantity'], 2)); ?></td>
             <td>
    <button wire:click="removeItem(<?php echo e($id); ?>)" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </tbody>
                    </table>
                </div>

<div class="d-flex justify-content-end mt-4">
 <div class="card p-4 shadow-sm" style="width: 300px;">
         <h5 class="font-weight-bold">Total: $<?php echo e(number_format($total, 2)); ?></h5>
                        <hr>
         <a href="<?php echo e(route('checkout')); ?>" class="btn btn-danger btn-block font-weight-bold" style="background-color: #f7444e; border-radius: 25px;">
                            PROCEED TO CHECKOUT
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <h4 class="text-muted">Your cart is empty!</h4>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/cart-page.blade.php ENDPATH**/ ?>