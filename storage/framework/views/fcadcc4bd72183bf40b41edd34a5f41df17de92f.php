<?php $__env->startSection('content'); ?>
<!--<?php echo $posts; ?>-->
<div class="container">
<?php foreach($posts as $post): ?>
    <h2><a href="<?php echo e(url('singlePost/'.$post->id)); ?>"><?= $post->title; ?></a></h2>
    <span id="frstSpan"><h5> author by :<?= $post->user->name; ?></h5> </span>
    <span><?= $post->content; ?></span>    
    <div><img src="<?php echo e(url($post->image)); ?>" alt="userImage" width="200" height="150"></div>
<?php endforeach; ?>

<div><?php echo $posts->render(); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>