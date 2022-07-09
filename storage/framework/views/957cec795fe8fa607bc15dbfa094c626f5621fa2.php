<header>
	<nav class="topbar">
		<div class="container">
			<div class="d-flex align-items-center py-1 topbar-body">
				<ul class="list-inline top-list mb-0">
					

					<li class="list-inline-item sm-hide"><a href="<?php echo e($staffemail->url); ?>" target="_blank">
					<?php echo e(__('label.mail')); ?></a></li>
					<li class="list-inline-item"><a href="<?php echo e(url('contactus')); ?>"><?php echo e(__('label.contact')); ?></a></li>
					<li class="list-inline-item sm-hide"><a href="single-page.html"></a></li>
					
					<li class="list-inline-item sm-hide"><a href="<?php echo e(url('faqs')); ?>"><?php echo e(__('label.faq_short')); ?></a></li>
					<li class="list-inline-item">
						<div class="dropdown">
						<?php if($local == 'sw'): ?>
							<button class="btn dropdown-toggle" type="button" id="dropdown_lang" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo e(asset('site/images/Tanzania.png')); ?>" alt=""> Swahili
							</button>
							<div class="dropdown-menu dropdown-menu-right languages-available"
								aria-labelledby="dropdown_lang">
								<?php $__currentLoopData = $altLocalizedUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="dropdown-item" id="usa" href="<?php echo e(env('APP_URL')); ?><?php echo e($alt['url']); ?>" onclick="dropdown_langSet(this);">
									<img src="<?php echo e(asset('site/images/USA.png')); ?>" alt=""> English</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
							<button class="btn dropdown-toggle" type="button" id="dropdown_lang" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo e(asset('site/images/USA.png')); ?>" alt=""> English
							</button>

							<div class="dropdown-menu dropdown-menu-right languages-available"
								aria-labelledby="dropdown_lang">
								<?php $__currentLoopData = $altLocalizedUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="dropdown-item" id="tanzania" href="<?php echo e(env('APP_URL')); ?><?php echo e($alt['url']); ?>" onclick="dropdown_langSet(this);">
									<img src="<?php echo e(asset('site/images/Tanzania.png')); ?>" alt=""> Swahili</a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							</div>
						</div>
					</li>
				</ul>
				
			</div>
		</div>
	</nav>
	<div class="banner">
		<div class="container">
			<div class=" d-flex justify-content-between align-items-center">
				<div class="py-2 emblem">
					<img src="<?php echo e(asset('site/images/emblem.png')); ?>" alt="emblem" class="img-fluid">
				</div>
				<div class="text-center mt-5 justify-content-between">
					<h5 class="mb-0 sm-hide title"><?php echo __('label.site_nation'); ?></h5> 
					<h1 class="mb-1 title align-items-center"><?php echo __('label.site_title'); ?></h1>
				</div>

				<div class="py-2">
					<div class="logo mx-auto">
						<a href="<?php echo e(url('/')); ?>">
							<img src="<?php echo e(asset('site/images/logo1.png')); ?>" alt="Logo" class="img-fluid">
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="baki-juu">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark top_navbar p-0">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#smallScreenNavbar"
					aria-controls="smallScreenNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="smallScreenNavbar">
					<ul class="navbar-nav mr-auto active-links">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(url('/')); ?>"><i class="fas fa-home"></i> </a>
						</li>
						<!-- ####################################################################################### -->
						<?php echo App\Models\MenuItem::getMenu($local); ?>

						<!-- ####################################################################################### -->
					</ul>
					<div class="search">
						<!-- <button class="btn-search"><i class="fa fa-search"></i></button> -->
						<div class="search-form">
							<form class="form-inline py-0 mr-auto">
								<input class="form-control mr-sm-2" type="search" placeholder="Search"
									aria-label="Search">
								<button class="btn-search pr-0" type="submit"><i class="fa fa-search"></i> </button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</header>