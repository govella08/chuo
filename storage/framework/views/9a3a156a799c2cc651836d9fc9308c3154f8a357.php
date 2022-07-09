

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __('label.sitemap'); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __('label.sitemap'); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><?php echo __('label.sitemap'); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<ol>
	<?php $__currentLoopData = App\Models\MenuItem::where('parent','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<li><a href='<?php echo e($menu->url); ?>'><?php echo e(__($menu->title)); ?></a>

		<?php if(App\Models\MenuItem::where('parent','=',$menu->id)->count() > 0): ?>
		<ul>
			<?php $__currentLoopData = App\Models\MenuItem::where('parent','=',$menu->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><a href='<?php echo e($sub_menu->url); ?>'>  <?php echo e(__($sub_menu->title)); ?></a></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
		<?php endif; ?>
	</li>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>
<?php $__env->stopSection(); ?>
<!-- ./page content section -->






























<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>