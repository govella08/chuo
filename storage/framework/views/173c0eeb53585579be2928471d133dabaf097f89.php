
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Change Password
		<?php if(Session::has('message')): ?>
		<?php echo e(Session::get('message')); ?>

		<?php endif; ?>
	</div>
</div>

<?php echo Form::open(['route' => 'cms.users.user-change-password']); ?>

<div class="large-5 columns">

	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('current_password'); ?></span>
			<?php echo Form::label('current_password', 'Current Password'); ?>

			<?php echo Form::password('current_password'); ?>

		</div>
	</div>


	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('password'); ?></span>
			<?php echo Form::label('password', 'New Password'); ?>

			<?php echo Form::password('password'); ?>

		</div>
	</div>

	<div class="row collapse">
		<div class="large-12 columns">
			<span class='form_error'><?php echo $errors->first('confirm_password'); ?></span>
			<?php echo Form::label('confirm_password', 'Retype Password'); ?>

			<?php echo Form::password('confirm_password'); ?>

		</div>
	</div>

	<div class="row">
		<div class="large-12 small-12 medium-12 columns">
			<?php echo Form::submit('Change Password', ['class' => 'custom-button']); ?>

		</div>
	</div>
</div>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>