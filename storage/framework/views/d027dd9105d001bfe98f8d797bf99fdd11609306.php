

<?php $__env->startSection('content'); ?>
		<div class="signin-form" >
     <div class="signin-info" style="background:#FFFFFF;">
			<div class="slogan">
				<div class="row" style="margin-left:-38px;">
					<div class="col-md-4"></div>
					<div class="col-md-7">
						<img   class="img-responsive" style="" src="<?php echo e(asset('site/images/emblem.png')); ?>" />
					</div>
					<div class="col-md-3"></div>
				</div>
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" style="color:black;font-size:30px;">
			
		      <center><h4>Login</h4></center></div>
		    <div class="col-md-2"></div>
			<!-- <div class="col-md-4">The United Republic of Tanzania</div> -->
			</div>
		 

			</div> 
		</div>
			<!-- Form -->
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

			<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/auth/login')); ?>">
				<?php echo csrf_field(); ?>	
				<div class="form-group w-icon has-error">
					<input name="email"   style="border:1px solid #0072BB;" id="username_id" class="form-control input-lg" placeholder="Enter your Email" required  type="text">
					<span class="signin-form-icon"><img src="lib/img/profile.png"></span>
				</div>

				<div class="form-group w-icon has-error" >
					<input name="password" id="password_id" style="border:1px solid #0072BB;" required class="form-control input-lg" placeholder="Password" type="password">
					<span class="signin-form-icon"><img src="lib/img/passwd.png"></span>
				</div>
				<div class="form-actions">
					<input value="Login" class="btn bg-primary" style="background:#34495E !important;" name="submit" type="submit">
					<a href="<?php echo e(url('/password/email')); ?>"  id="forgot-password-link" style="color:black;">Forgot your password?</a>
				</div> 
			</form>

			<!-- / Form -->
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.app_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>