<?php $__env->startSection('title', 'Create Category'); ?>

<?php $__env->startSection('admin_layout'); ?>
<div class="row justify-content-center" style="margin-top: 30px; padding:50px;">
    <div class="col-md-6" style=" padding:10px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center fs-5 fw-bold">
                Create New Category
            </div>
            <div class="card-body">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                              <li><?php echo e($error); ?></li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form action="<?php echo e(route('admin.category.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <!-- Category Name -->
                    <div class="form-group mb-4">
                        <label for="name" class="form-label fw-bold">Category Name</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                               class="form-control border border-primary rounded py-2 px-3"
                               id="name" placeholder="Enter category name" required>
                    </div>

                    <!-- Status -->
                    <div class="form-group mb-4">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select name="status"
                                class="form-control border border-success rounded py-2 px-3"
                                id="status">
                            <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>Inactive</option>
                        </select>


                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100 py-2">Create Category</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce_pro\resources\views/admin/category/create.blade.php ENDPATH**/ ?>