<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a>
            </li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.pos')); ?></a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 float-right my-4">
                <form action="<?php echo e(URL::to('admin/pos/items')); ?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded" name="search" <?php if(isset($_GET['search'])): ?> value="<?php echo e($_GET['search']); ?>" <?php endif; ?> placeholder="<?php echo e(trans('labels.type_and_enter')); ?>" aria-label="<?php echo e(trans('labels.type_and_enter')); ?>" aria-describedby="basic-addon2">
                        <div class="input-group-append px-1">
                            <select class="form-control rounded" name="option">
                                <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                <option value="veg" <?php if(isset($_GET['option'])): ?> <?php if($_GET['option'] == 'veg'): ?> selected <?php endif; ?> <?php endif; ?>> <?php echo e(trans('labels.veg')); ?></option>
                                <option value="nonveg" <?php if(isset($_GET['option'])): ?> <?php if($_GET['option'] == 'nonveg'): ?> selected <?php endif; ?> <?php endif; ?>> <?php echo e(trans('labels.nonveg')); ?></option>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary rounded" type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="item-section">
        <?php echo $__env->make('admin.pos.itemlisting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</div>


<div class="modal fade modalitemdetails" id="modalitemdetails" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header align-items-start">

            <span class="mr-1" id="item_type_image"></span>
            <div class="d-grid">
                <h4 class="modal-title fs-4 mr-1 item_name"></h4>
                <span class="text-muted item_price"></span>
            </div>

            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        </div>
        <div class="modal-body">
            <div class="row align-items-center">
                <div class="col-lg-10 col-md-10 col-sm-10 m-auto">
                    <div class="item-details">
                        <div class="item-varition-list mb-4" id="variation">
                            <h5 class="attribute"></h5>
                            <div class="mx-2 varition-listing">
                                
                            </div>
                        </div>
                        <div class="item-addons-list my-4" id="addons">
                            <h5><?php echo e(trans('labels.addons')); ?></h5>
                            <div class="mx-2 addons-listing">
                                
                            </div>
                        </div>

                        
                        <input type="hidden" name="item_id" id="item_id">
                        
                        <input type="hidden" name="item_name" id="item_name">
                        
                        <input type="hidden" name="item_type" id="item_type">
                        
                        <input type="hidden" name="image_name" id="image_name">
                        
                        <input type="hidden" name="tax" id="item_tax">
                        
                        <input type="hidden" name="item_price" id="item_price">
                        
                        <input type="hidden" name="addonstotal" id="addonstotal" value="0">
                        
                        <input type="hidden" name="subtotal" id="subtotal" value="0">

                        <div class="modal-footer px-0">
                            <button class="btn btn-block btn-success" onclick="addtocart('<?php echo e(URL::to('admin/pos/addtocart')); ?>')">
                                <div class="d-flex justify-content-between">
                                    <h5 class="subtotal m-0 text-white"></h5>
                                    <span class="text-white"><i class="ti-shopping-cart-full"></i> <?php echo e(trans('labels.add_to_cart')); ?></span>
                                </div>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php if(session()->get('cartdata') != '' && count(session()->get('cartdata')) > 0): ?>
<a href="<?php echo e(URL::to('/admin/pos/items/checkout')); ?>" class="btn-view-cart"><?php echo e(trans('labels.view_my_order')); ?> -
    <?php echo e(count(session()->get('cartdata'))); ?> </a>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/pos/pos.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\single-restaurant\website\resources\views/admin/pos/index.blade.php ENDPATH**/ ?>