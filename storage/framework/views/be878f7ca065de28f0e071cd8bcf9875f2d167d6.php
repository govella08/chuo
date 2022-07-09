
<?php $__env->startSection('content'); ?>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
	<!-- 	<?php if($message = Session::get('success')): ?>
             <div class="alert alert-success">
               <?php echo e($message); ?>

              </div>
              <?php endif; ?> -->
              <div class="content-panel">

              	<?php if($users->count() == 0): ?>
              	
              	<div class="content content-large empty-content">
              		<div class="empty-text">
              			<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
              		</div>
              	</div>
              	<?php else: ?>

              	<div class="title">
              		users 
              	</div>

              	<div class="content content-large">

              		<table>
              			<thead>
              				<tr>
              					<th>Name</th>
              					<th>Email</th>
              					<th>Role(s)</th>
              					<th></th>
              					<th></th>
              				</tr>
              			</thead>

              			<tbody>

              				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              				<tr>
              					<td class="show" data-item-value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></td>
              					<td class="show" data-item-value="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></td>
              					<td class="show"><?php echo e(str_replace('"','',json_encode($user->roles->pluck('name')))); ?></td>
              					<td>
              						
              						<a href="<?php echo e(URL::route('cms.users.user-roles-form', $user->id)); ?>" class="item-edit">View Roles</a>
              						<a href="<?php echo e(URL::route('cms.users.edit-user', $user->id)); ?>" class="item-edit">Edit User</a>
              					</td>
              					<td>
              						<?php echo link_to_route('cms.users.destroy', "", array($user->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?>

              					</td>
              				</tr>
              				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              			</tbody>
              		</table>
              	</div>
              	<?php endif; ?>

              </div>
              
          </div>

          <div class="large-6 columns medium-12 small-12 columns">
          	<div class="content-panel">
          		<div class="title">
          			New User
          		</div>

          		<div class="content content-large">
          			<?php echo Form::open(['route' => 'cms.users.create-user']); ?>


          			<?php echo $__env->make('cms.users_mgt._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          			
          			<?php echo Form::close(); ?>

          		</div>
          	</div>
          </div>
      </div>


      <?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>