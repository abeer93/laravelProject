<?php $__env->startSection('content'); ?>
<div class="container">
<form method="post" action="<?php echo e(url('/addUser')); ?>" >
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="form-group">
        <label for="title" >User name : </label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Email : </label>
        <input type="email" name="email" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Password : </label>
        <input type="password" name="password" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Confirm Password : </label>
        <input type="password" name="confPassword" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Is Admin: </label>
        <input type="checkbox" value="0"  null name="admin" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Is Blocked : </label>
        <input type="checkbox" value="0" null name="blocked" class="form-control" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
</div>

</form>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>