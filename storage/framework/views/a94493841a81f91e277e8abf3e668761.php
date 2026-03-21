<?php $__env->startSection('title', 'Create Product'); ?>

<?php $__env->startSection('admin_layout'); ?>


<div class="container">
    <h2>Add New Product</h2>
    <form action="<?php echo e(route('admin.product.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
        <label>Product Name</label>
        <input type="text" name="name" id="product_name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
         value="<?php echo e(old('name')); ?>"placeholder="Enter Product Name" required>
        </div>
        <div class="form-group mb-3">
            <label>Select Category</label>
            <select name="category_id" class="form-control" id="category_id" required>
                <option value="">Select Category</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Select Sub-Category</label>
            <select name="subcategory_id" class="form-control" id="subcategory_id">
                <option value="">Select Sub-Category First</option>
            </select>
        </div>
        <div class="row">
             <div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" readonly>
</div>

                  </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>

 <div class="col-md-4 mb-3">
                    <label>Discount Percent (%)</label>
                    <input type="number" name="discount_percent" class="form-control" value="0" min="0" max="100">
                </div>

            <div class="col-md-6 mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
        </div>

        <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required><?php echo e(old('description')); ?></textarea>
            </div>
        <div class="form-group mb-3">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/admin/get-subcategories/' + categoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="">Select Sub-Category</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory_id').empty();
            }
        });



// Slug Generator
        $('#product_name').on('keyup', function() {
            let text = $(this).val();
            let slug = text.toLowerCase()
                           .replace(/[^a-z0-9 -]/g, '')
                           .replace(/\s+/g, '-')
                           .replace(/-+/g, '-');
            $('#slug').val(slug);
        });
    });



</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce_pro\resources\views/admin/product/create.blade.php ENDPATH**/ ?>