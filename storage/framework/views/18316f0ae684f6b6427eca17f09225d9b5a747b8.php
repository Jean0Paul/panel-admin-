<?php if(count($getitem) > 0): ?>
    <div class="row item-list-view">
        <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-2">
                <div class="card card-section text-center">
                    <?php
                        $image_name = $item['item_image']->image_name;
                        $image_url = $item['item_image']->image_url;
                    ?>
                    <?php if($item->addons_id != '' || count($item->variation) > 0): ?>
                        <div class="ribbon"><span><?php echo e(trans('labels.customizable')); ?></span></div>
                    <?php endif; ?>
                    <img src="<?php echo e($image_url); ?>" class="listing-view-image mx-auto" alt="...">
                    <div class="card-body py-3">
                        <h6 class="card-title fw-bold mb-2"> <img
                                <?php if($item->item_type == 1): ?> src="<?php echo e(Helper::image_path('veg.svg')); ?>" <?php else: ?> src="<?php echo e(Helper::image_path('nonveg.svg')); ?>" <?php endif; ?>
                                class="item-type-img" alt=""> <?php echo e($item->item_name); ?></h6>
                        <div class="item-details px-2">
                            <p class="d-flex justify-content-between my-0"><?php echo e(trans('labels.category')); ?>

                                <span><?php echo e(@$item['category_info']->category_name); ?></span></p>
                            <p class="d-flex justify-content-between my-0"><?php echo e(trans('labels.preparation_time')); ?>

                                <span><?php echo e($item->preparation_time); ?></span></p>
                            <p class="d-flex justify-content-between my-0"><?php echo e(trans('labels.tax')); ?>

                                <span><?php echo e(number_format($item->tax, 2)); ?>%</span></p>
                        </div>
                    </div>
                    <div class="card-footer py-0">
                        <div class="row justify-content-center">
                            <?php if($item->addons_id != '' || count($item->variation) > 0): ?>
                                <a class="btn px-2 text-dark"
                                    onclick="showitem('<?php echo e($item->id); ?>','<?php echo e(URL::to('admin/pos/show-item')); ?>')"><i
                                        class="fa fa-shopping-bag px-1"></i><?php echo e(trans('labels.add_to_cart')); ?></a>
                            <?php else: ?>
                                <a class="btn px-2 text-dark"
                                    onclick="addcart('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_type); ?>','<?php echo e($image_name); ?>','<?php echo e($item->tax); ?>','<?php echo e($item->price); ?>','<?php echo e(URL::to('admin/pos/addtocart')); ?>')"><i
                                        class="fa fa-shopping-bag px-1"></i><?php echo e(trans('labels.add_to_cart')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <?php echo e($getitem->appends(request()->query())->links()); ?>

        </div>
    </div>
<?php else: ?>
    <div class="row">

        <div class="card col-md-12">
            <div class="card-body d-flex justify-content-center">
                <h4 class="card-header text-muted"><?php echo e(trans('labels.no_data')); ?></h4>
            </div>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\single-restaurant\website\resources\views/admin/pos/itemlisting.blade.php ENDPATH**/ ?>