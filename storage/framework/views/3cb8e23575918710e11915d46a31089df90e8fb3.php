
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		<div class="content-panel">


			<div class="title">
				
				<?php echo e($user->name); ?> Roles  <a href="<?php echo e(URL::route('cms.users.create-user-form', $user->id)); ?>" class="item-edit">Back to users list</a>
			</div>

			<div class="content content-large">
				<?php echo Form::open(['route' => 'cms.users.update-user-roles']); ?>

				<?php echo Form::hidden('user_id',$user->id); ?>

				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show"><label><?php echo Form::checkbox('roles[]',$role->id,$role->role_id); ?> <?php echo e($role->name); ?></label><a href="<?php echo e(URL::route('cms.users.user-permissions-form', $role->id)); ?>" class="item-edit">View Permissions</a></td>
							<td>
								
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<div class="row">
					<div class="large-12 small-12 medium-12 columns">
						<?php echo Form::submit("UPDATE", ['class' => 'custom-button']); ?>

					</div>
				</div>
				<?php echo Form::close(); ?>

			</div>
			
		</div>
		
	</div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>