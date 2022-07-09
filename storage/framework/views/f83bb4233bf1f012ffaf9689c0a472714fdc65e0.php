
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-8 medium-12 small-12 columns">
		<div class="content-panel">

			<?php if($roles->count() == 0): ?>
			
			<div class="content content-large empty-content">
				<div class="empty-text">
					<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
				</div>
			</div>
			<?php else: ?>

			<div class="title">
				CMS Roles 
			</div>

			<div class="content content-large">

				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Display Name</th>
							<th>Description</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show"><?php echo e($role->name); ?></td>
							<td class="show"><?php echo e($role->display_name); ?></td>
							<td class="show"><?php echo e($role->description); ?></td>
							<td>
								<a href="<?php echo e(URL::route('cms.roles.edit', $role->id)); ?>" class="item-edit">Edit</a>
								<a href="<?php echo e(URL::route('cms.users.user-permissions-form', $role->id)); ?>" class="item-edit">Permissions</a>
								<?php echo link_to_route('cms.roles.destroy', "", array($role->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		
	</div>

	<div class="large-4 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Role
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.roles.index', 'files' => true]); ?>


				<?php echo $__env->make('cms.users_mgt.roles._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>