<?php $__env->startComponent('mail::message'); ?>
# Your post was liked

<?php echo e($liker->name); ?> liked one of your posts

<?php $__env->startComponent('mail::button', ['url' => route('posts.show', $post)]); ?>
View Post
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\LAURA-PC\Desktop\Udemy\laravel\study\resources\views/emails/posts/post_liked.blade.php ENDPATH**/ ?>