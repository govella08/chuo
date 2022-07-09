
<div class="row collapse">

	<div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Edit <?php echo e($menuitem->name); ?>

			</div>

			<div class="content">
				<?php echo Form::model($menuitem, ['route' => ['cms.menu-items.update', $menuitem->id], 'method' => 'PATCH']); ?>


					<?php echo $__env->make('cms.menus.menu_items._form', ['submitButton' => "Update"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


					<!-- <div class="row"> -->
						<div class="large-4 small-12 medium-12 columns">
								<a href="<?php echo e(route('cms.menu-items.destroy',$menuitem->id)); ?>" class="tiny button delete-button" data-method="DELETE" data-confirm="Are you sure?">Delete</a>
						</div>
					<!-- </div> -->

				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>

