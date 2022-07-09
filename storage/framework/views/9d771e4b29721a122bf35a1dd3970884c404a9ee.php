<?php $__env->startSection('stylesheets'); ?>
<link rel="stylesheet" href="<?php echo asset('stylesheets/movable_menu.css'); ?>" >
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Menu Items for  "<?php echo e($menu->title_en); ?>" Menu   
		<a href="<?php echo e(URL::route('cms.menu.index')); ?>"><i class="icon-back"></i>  Back to Menus</a>
	</div>
</div>

<div class="row collapse">
	<div class="large-6 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				
				<div class="cf nestable-lists">

					<div class="dd" id="nestable">
						<ol class="dd-list">
							<?php echo recursiveMenu('0',$menu->id); ?>

						</ol>
					</div>

				</div>


			</div>
		</div>
		
	</div>

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				New Menu Item
			</div>

			<div class="content">
				<?php echo Form::model($menuItem,['route' => 'cms.menu-items.store']); ?>


				<?php echo $__env->make('cms.menus.menu_items._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).foundation();
	});
</script>
<script src="<?php echo asset('javascript/jquery.nestable.js'); ?>"></script>

<script src="<?php echo asset('javascript/movable_menu.js'); ?>"></script>

<script src="<?php echo asset('javascript/forms.js'); ?>"></script>

<script src="<?php echo asset('javascript/menu.js'); ?>"></script>

<script src="<?php echo asset('javascript/links.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>