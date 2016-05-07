<?php $__env->startSection('content'); ?>
<div class="container">
<form method="post" action="<?php echo e(url('editProfile/'.$user->id)); ?>" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="form-group">
        <label for="title" >User name : </label>
        <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" />
    </div>
    <div class="form-group">
        <label for="content">Email : </label>
        <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" />
    </div>
    <div class="form-group">
        <!-- <label for="content">Image : </label> -->
        <img src="<?php echo e(url($user->image)); ?>" alt="userImage" width="200" height="150">
        <input type="file" name="image" class="form-control" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
</div>

</form>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>