<?php $__env->startSection('content'); ?>
<!--<?php echo $posts; ?>-->
<div class="container">
<?php foreach($posts as $post): ?>
    <h2><a href="<?php echo e(url('singlePost/'.$post->id)); ?>"><?= $post->title; ?></a></h2>
    <span id="frstSpan"><h5> author by :<?= $post->user->name; ?></h5> </span>
    <span><?= $post->content; ?></span>   
    <div>
    	<form action="<?php echo e(url('publish/'.$post->id)); ?>" method="post" accept-charset="utf-8">
    		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        	<button type="submit" value="publish" class="btn btn-primary">publish</button>
        </form>    
    </div>    
<?php endforeach; ?>

<div><?php echo $posts->render(); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>