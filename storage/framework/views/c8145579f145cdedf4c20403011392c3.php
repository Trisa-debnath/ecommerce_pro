<?php if (isset($component)) { $__componentOriginal44ddf989ff8d6bcb9f58816215e285ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44ddf989ff8d6bcb9f58816215e285ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.shop_layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.shop_layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>About Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Welcome to Trisa's Shop</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center; margin-top: 20px;">
                        আমরা সেরা মানের ইলেকট্রনিক পণ্য সরবরাহ করি। আমাদের লক্ষ্য গ্রাহকদের সাশ্রয়ী মূল্যে জেনুইন গ্যাজেট পৌঁছে দেওয়া।
                    </p>
                </div>
            </div>
        </div>
    </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44ddf989ff8d6bcb9f58816215e285ba)): ?>
<?php $attributes = $__attributesOriginal44ddf989ff8d6bcb9f58816215e285ba; ?>
<?php unset($__attributesOriginal44ddf989ff8d6bcb9f58816215e285ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44ddf989ff8d6bcb9f58816215e285ba)): ?>
<?php $component = $__componentOriginal44ddf989ff8d6bcb9f58816215e285ba; ?>
<?php unset($__componentOriginal44ddf989ff8d6bcb9f58816215e285ba); ?>
<?php endif; ?>
<?php /**PATH D:\ecommerce_pro\resources\views/home/about.blade.php ENDPATH**/ ?>