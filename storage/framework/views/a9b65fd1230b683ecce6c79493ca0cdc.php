<?php $__env->startSection('title', 'manage product'); ?>
<?php $__env->startSection('admin_layout'); ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product Inventory</h2>
        <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-primary">Add New Product</a>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="table-responsive">
        <table class="table table-hover border">
            <thead class="bg-light">
                <tr>
                     <th>SL</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <tr>

            <td><?php echo e($products->firstItem() + $key); ?></td>

                    <td>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
                            <img src="<?php echo e(asset('uploads/products/'.$product->image)); ?>" width="50" class="rounded border">
                        <?php else: ?>
                            <img src="<?php echo e(asset('uploads/no-image.png')); ?>" width="50">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td>
                        <strong><?php echo e($product->name); ?></strong><br>
                        <small class="text-muted"><?php echo e($product->slug); ?></small>
                    </td>
                    <td><?php echo e($product->category->name ?? 'N/A'); ?></td>
                    <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                    <td><span class="badge bg-info text-dark"><?php echo e($product->discount_percent); ?>% OFF</span></td>
                    <td><?php echo e($product->quantity); ?></td>
                    <td>
                        <span class="badge <?php echo e($product->status == 1 ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo e($product->status == 1 ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                    <div class="d-flex align-items-center">
                <a href="<?php echo e(route('admin.product.edit', $product->id)); ?>" class="btn btn-sm btn-info me-3">Edit</a>
                 <form action="<?php echo e(route('admin.product.delete', $product->id)); ?>" method="POST" class="d-inline-block me-0">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo e($products->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce_pro\resources\views/admin/product/manage.blade.php ENDPATH**/ ?>