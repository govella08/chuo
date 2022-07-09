

<!-- setting browser tab title -->
<?php $__env->startSection('title'); ?>
<?php echo __('label.projects', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting browser tab title -->

<!-- setting page title -->
<?php $__env->startSection('page-title'); ?>
<?php echo __('label.projects', [], $currentLanguage->locale); ?>

<?php $__env->stopSection(); ?>
<!-- ./setting page title -->

<?php $__env->startSection('breadcrumbs-list'); ?>
<li class="breadcrumb-item active"><?php echo e(__('label.projects', [], $currentLanguage->locale)); ?></li>
<?php $__env->stopSection(); ?>


<!-- page content section -->
<?php $__env->startSection('page-content'); ?>
<?php if(count($projects)): ?>


<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th><?php echo __('label.project_name'); ?></th>
			<th><?php echo __('label.implementation_agency'); ?></th>
			<th><?php echo __('label.coverage_area'); ?></th>
			<th><?php echo __('label.project_funder'); ?></th>
			<th><?php echo __('label.duration'); ?></th>
			<th><?php echo __('label.number_of_beneficiaries'); ?> </th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

		<tr>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo e($key+1); ?></a></td>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo __($project->title_translation); ?></a></td>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo e($project->implementer); ?></a></td>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo e($project->area_of_coverage); ?></a></td>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo $project->sponsor; ?></a></td>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo __($project->duration); ?></a></td>
			<td> <a href="<?php echo e(url('project',$project->slug)); ?>" class="link"><?php echo e($project->number_of_beneficiaries); ?></a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




	</tbody>
</table>
<?php else: ?>
<?php echo e(__('label.no_information', [], $currentLanguage->locale)); ?>

<?php endif; ?>
<!-- ********************************************** Pagination **********************************************   -->
<nav aria-label="Page navigation" class="nav-pagination">

	<?php echo $projects->render(); ?>



</nav>
<!-- ********************************************** Pagination **********************************************   -->
<?php $__env->stopSection(); ?>
<!-- ./page content section -->
<?php echo $__env->make('site.page-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>