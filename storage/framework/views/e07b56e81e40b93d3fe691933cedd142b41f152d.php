<?php $__env->startSection('content'); ?>
<div class="container">
<form method="post" action="<?php echo e(url('updatePost/'.$post->id)); ?>">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="form-group">
        <label for="title" >Title : </label>
        <input type="text" name="title" class="form-control" value="<?php echo e($post->title); ?>"/>
    </div>
    <div class="form-group">
        <label for="content">Content : </label>
        <input type="text" name="content" class="form-control" value="<?php echo e($post->content); ?>"/>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit" />
    </div>


</form>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>