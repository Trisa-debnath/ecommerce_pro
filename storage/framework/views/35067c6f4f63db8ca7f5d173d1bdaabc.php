<?php

use Livewire\Volt\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;

?>

<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>What Says Our Customers</h2>
        </div>
        <div class="row">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="col-md-4 mt-4">
                <div class="box p-4 border shadow-sm text-center">
                    <div class="img-box mb-3">
                        <img src="<?php echo e(asset('home/images/' . $client->image)); ?>" class="rounded-circle" width="80" alt="">
                    </div>
                    <div class="detail-box">
                        <h5><?php echo e($client->name); ?></h5>
                        <h6><?php echo e($client->designation); ?></h6>
                        <p class="mt-2" style="font-style: italic;">"<?php echo e($client->comment); ?>"</p>
                        <div class="stars text-warning">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i=0; $i<$client->rating; $i++): ?>
                                <i class="fa fa-star"></i>
                            <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <p class="text-center w-100">No testimonials found.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section><?php /**PATH D:\ecommerce_pro\resources\views\livewire/home/testimonial.blade.php ENDPATH**/ ?>