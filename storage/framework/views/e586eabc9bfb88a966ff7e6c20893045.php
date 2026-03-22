<?php $__env->startSection('title', 'Order Details'); ?>

<?php $__env->startSection('admin_layout'); ?>
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold text-dark"><i class="icon-doc mr-2">
            </i> Order: #<?php echo e($order->order_number); ?></h3> </br>
        <a href="<?php echo e(route('admin.orders')); ?>" class="btn btn-secondary shadow-sm">
            <i class="icon-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 font-weight-bold"><i class="icon-user mr-2 text-primary"></i> Customer Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="mb-1 text-muted">Customer Name</p>
                            <h6 class="font-weight-bold"><?php echo e($order->name); ?></h6>
                            <p class="mb-1 text-muted mt-3">Email Address</p>
                            <h6 class="font-weight-bold"><?php echo e($order->email); ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1 text-muted">Phone Number</p>
                            <h6 class="font-weight-bold"><?php echo e($order->phone); ?></h6>
                            <p class="mb-1 text-muted mt-3">Shipping Address</p>
                            <h6 class="font-weight-bold"><?php echo e($order->address); ?>, <?php echo e($order->city); ?></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 font-weight-bold"><i class="icon-basket mr-2 text-primary"></i> Order Items</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 pl-4">Product Name</th>
                                    <th class="border-0 text-center">Price</th>
                                    <th class="border-0 text-center">Qty</th>
                                    <th class="border-0 text-right pr-4">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <tr>
                                    <td class="pl-4 align-middle">
                                        <span class="font-weight-bold text-dark"><?php echo e($item->product->name ?? 'Product Deleted'); ?></span>
                                    </td>
                                    <td class="text-center align-middle">৳<?php echo e(number_format($item->price, 2)); ?></td>
                                    <td class="text-center align-middle">
                                        <span class="badge badge-pill badge-light border px-3 py-2"><?php echo e($item->quantity); ?></span>
                                    </td>
                                    <td class="text-right pr-4 align-middle font-weight-bold">৳<?php echo e(number_format($item->price * $item->quantity, 2)); ?></td>
                                </tr>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold">Grand Total:</td>
                                    <td class="text-right pr-4 font-weight-bold text-danger h5">৳<?php echo e(number_format($order->total_amount, 2)); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4 text-white" style="background: #4e73df; background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Order Status</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Current Status:</span>
                        <span class="badge badge-light text-uppercase"><?php echo e($order->order_status); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Payment:</span>
                        <span class="badge badge-light text-uppercase"><?php echo e($order->payment_status); ?></span>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 font-weight-bold"><i class="icon-settings mr-2 text-primary"></i> Action Center</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.orders.update', $order->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="font-weight-bold small text-uppercase">Update Order Status</label>
                            <select name="order_status" class="form-control custom-select">
                                <option value="pending" <?php echo e($order->order_status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="processing" <?php echo e($order->order_status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                                <option value="delivered" <?php echo e($order->order_status == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                                <option value="cancelled" <?php echo e($order->order_status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label class="font-weight-bold small text-uppercase">Update Payment Status</label>
                            <select name="payment_status" class="form-control custom-select">
                                <option value="pending" <?php echo e($order->payment_status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="paid" <?php echo e($order->payment_status == 'paid' ? 'selected' : ''); ?>>Paid</option>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold shadow-sm">
                            <i class="icon-check mr-1"></i> SAVE CHANGES
                        </button>
                    </form>
                </div>
            </div>

            <button class="btn btn-outline-dark btn-block mt-3 py-2" onclick="window.print()">
                <i class="icon-printer mr-1"></i> Print Invoice
            </button>
        </div>
    </div>
</div>

<style>
    .card { border-radius: 12px; }
    .card-header { border-bottom: 1px solid #f1f1f1; border-radius: 12px 12px 0 0 !important; }
    .table thead th { font-size: 13px; text-uppercase: true; color: #777; letter-spacing: 0.5px; }
    .custom-select { height: 45px; border-radius: 8px; }
    @media print {
        .btn, .action-center, .sidebar, .header { display: none !important; }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce_pro\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>