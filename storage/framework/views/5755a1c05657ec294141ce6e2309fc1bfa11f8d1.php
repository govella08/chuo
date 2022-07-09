
<?php $__env->startSection('content'); ?>

<div class="row collapse">

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit User
			</div>

			<div class="content content-large">
				<?php echo Form::model($users, ['route' => ['cms.users.update-user', $users->id], 'files' => true, 'method' => 'POST']); ?>

				<?php echo Form::label('Reset Password', ' Reset Password'); ?>

				<?php echo Form::checkbox('check'); ?>

				<?php echo $__env->make('cms.users_mgt._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>