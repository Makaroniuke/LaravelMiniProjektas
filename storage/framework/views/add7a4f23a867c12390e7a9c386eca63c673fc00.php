<?php $attributes = $attributes->exceptProps(['post'=> $post]); ?>
<?php foreach (array_filter((['post'=> $post]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>
    <div class="mb-4">
        <a href="<?php echo e(route('users.posts', $post->user)); ?>" class="font-bold"><?php echo e($post ->user->name); ?></a>
        <span class="text-gray-600 text-sm"><?php echo e($post->created_at->diffForHumans()); ?></span>

        <p class="mb-2"><?php echo e($post->body); ?></p>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete')): ?>
            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        <?php endif; ?>
       

        <div class="flex items-center">
            <?php if(auth()->guard()->check()): ?>
            <?php if(!$post->likedBy(auth()->user())): ?>
                <form action="<?php echo e(route('posts.likes', $post)); ?>" method="post" class="mr-1">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            <?php else: ?>
                <form action="<?php echo e(route('posts.likes', $post)); ?>" method="post" class="mr-1">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            <?php endif; ?>

                

            <?php endif; ?>

            <span><?php echo e($post->likes->count()); ?> <?php echo e(Str::plural('like', $post->likes->count())); ?></span>
        </div>
    </div>
</div><?php /**PATH C:\Users\LAURA-PC\Desktop\Udemy\laravel\study\resources\views/components/post.blade.php ENDPATH**/ ?>