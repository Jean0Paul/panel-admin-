
<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">OTP Configurations</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Twilio Credential</h4>
                    <div class="basic-form">
                        <form method="post" action="<?php echo e(URL::to('admin/otp-configuration/update')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($twilioconfigurations->id); ?>">
                            <input type="hidden" class="form-control" name="name" id="name" value="<?php echo e($twilioconfigurations->name); ?>">
                            <div class="form-group">
                                <label id="twilio_sid">Twilio SID</label>
                                <input type="text" class="form-control" name="twilio_sid" id="twilio_sid" placeholder="Enter Twilio SID" value="<?php echo e($twilioconfigurations->twilio_sid); ?>">   
                            </div>
                            <div class="form-group">
                                <label id="twilio_auth_token">Twilio Auth Token</label>
                                <input type="text" class="form-control" name="twilio_auth_token" id="twilio_auth_token" placeholder="Enter Twilio Auth Token" value="<?php echo e($twilioconfigurations->twilio_auth_token); ?>">
                            </div>
                            <div class="form-group">
                                <label id="twilio_mobile_number">Twilio Mobile number</label>
                                <input type="text" class="form-control" name="twilio_mobile_number" id="twilio_mobile_number" placeholder="Enter Twilio Mobile number" value="<?php echo e($twilioconfigurations->twilio_mobile_number); ?>">
                            </div>
                            <div class="form-group">
                                <label id="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" <?php if($twilioconfigurations->status == "1"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Active</option>
                                    <option value="0" <?php if($twilioconfigurations->status == "0"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Deactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MSG91 Credential</h4>
                    <div class="basic-form">
                        <form method="post" action="<?php echo e(URL::to('admin/otp-configuration/update')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($msg91configurations->id); ?>">
                            <input type="hidden" class="form-control" name="name" id="name" value="<?php echo e($msg91configurations->name); ?>">
                            <div class="form-group">
                                <label id="msg_authkey">Auth key</label>
                                <input type="text" class="form-control" name="msg_authkey" id="msg_authkey" placeholder="Enter AUTHKEY" value="<?php echo e($msg91configurations->msg_authkey); ?>">   
                            </div>
                            <div class="form-group">
                                <label id="msg_template_id">Template id</label>
                                <input type="text" class="form-control" name="msg_template_id" id="msg_template_id" placeholder="Enter template id" value="<?php echo e($msg91configurations->msg_template_id); ?>">
                            </div>
                            <div class="form-group">
                                <label id="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" <?php if($msg91configurations->status == "1"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Active</option>
                                    <option value="0" <?php if($msg91configurations->status == "0"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Deactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\single-restaurant\website\resources\views/otp-settings.blade.php ENDPATH**/ ?>