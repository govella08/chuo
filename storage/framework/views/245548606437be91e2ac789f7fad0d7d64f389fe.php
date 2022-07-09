

<?php $__env->startSection('content'); ?>
<div class="signin-form">
	<div class="signin-info" style="background:#FFFFFF;">
		<div class="slogan">
			<div class="row" style="margin-left:-38px;">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<img   class="img-responsive" style="" src="<?php echo e(asset('site/images/logo.png')); ?>" />
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" style="color:black;font-size:30px;">
					
					<h4>Reset Password</h4></div>
					<div class="col-md-2"></div>
					<!-- <div class="col-md-4">The United Republic of Tanzania</div> -->
				</div>

			</div> 
		</div>
		<!-- Form -->

		<?php if(session('status')): ?>
		<div class="alert alert-success">
			<?php echo e(session('status')); ?>

		</div>
		<?php endif; ?>

		<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
		<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

			<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<input type="email" required placeholder="Enter your email address" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<input type="submit" style="background:#34495E !important;"  class="btn btn-primary" value="Send Password Reset Link">
					
					
				</div>
			</div>
		</form>
		

		<!-- / Form -->
	</div>

	<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.app_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>