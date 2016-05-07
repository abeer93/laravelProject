<?php $__env->startSection('content'); ?>

<div class="container">
<?php if(!Auth::guest() && Auth::user()->admin): ?>

<?php foreach($users as $user): ?>

<div class="first">
    <h2><a href="userPosts/<?php echo $user->id; ?>"><?= $user->name; ?></a></h2>
    <li><?= $user->email; ?></li>
    <input name="admin" type="checkbox"   value="<?= $user->admin; ?>" 
    <?php  if($user->admin) echo 'checked';?> > <label> Is Admin   </label>
    <br/>
    <input name="blocked" type="checkbox" value="<?php echo e($user->blocked); ?>" 
    <?php  if($user->blocked) echo 'checked';?>> <label> Is Blocked  </label>



</div>       

<?php endforeach; ?>
 <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>