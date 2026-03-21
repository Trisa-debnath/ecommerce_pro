<?php

use Livewire\Volt\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="mb-4 text-center font-weight-bold" style="color: #333;">Checkout</h2>

            <div class="row">
                <div class="col-md-7 mb-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 font-weight-bold"><i class="fa fa-truck mr-2"></i> Shipping Information</h5>
                        </div>
                        <div class="card-body p-4">
                            <form wire:submit.prevent="placeOrder">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Full Name</label>
                                    <input type="text" wire:model="name" class="form-control" placeholder="Enter full name">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="font-weight-bold">Email Address</label>
                                        <input type="email" wire:model="email" class="form-control" placeholder="Email">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="font-weight-bold">Phone Number</label>
                                        <input type="text" wire:model="phone" class="form-control" placeholder="01XXX-XXXXXX">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">City</label>
                                    <input type="text" wire:model="city" class="form-control" placeholder="Enter city">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Shipping Address</label>
                                    <textarea wire:model="address" class="form-control" rows="3" placeholder="Street address, house no, etc."></textarea>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <hr class="my-4">

                                <h5 class="font-weight-bold mb-3">Payment Method</h5>
                                <div class="payment-options">
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="cod" wire:model="payment_method" value="cod" class="custom-control-input">
                                        <label class="custom-control-label" for="cod">Cash on Delivery (COD)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="online" wire:model="payment_method" value="online" class="custom-control-input">
                                        <label class="custom-control-label" for="online">Online Payment (bKash/SSL)</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger btn-block mt-4 py-3 font-weight-bold shadow-sm" style="background-color: #f7444e; border-radius: 8px;">
                                    PLACE ORDER NOW
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card shadow-sm border-0 rounded-lg sticky-top" style="top: 20px;">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 font-weight-bold">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <?php $cart = session()->get('cart', []); $total = 0; ?>

                            <div class="cart-items mb-3" style="max-height: 300px; overflow-y: auto;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h6 class="mb-0 font-weight-bold"><?php echo e($item['name']); ?></h6>
                                            <small class="text-muted">Qty: <?php echo e($item['quantity']); ?></small>
                                        </div>
                                        <span class="font-weight-bold text-dark">৳<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></span>
                                    </div>
                                    <?php $total += $item['price'] * $item['quantity']; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>৳<?php echo e(number_format($total, 2)); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping Cost</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="font-weight-bold mb-0">Total</h5>
                                <h4 class="font-weight-bold mb-0 text-danger">৳<?php echo e(number_format($total, 2)); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/checkout.blade.php ENDPATH**/ ?>