

<?php $__env->startSection('stylesheets'); ?>
<style type="text/css" media="screen">
.role-permission {
	margin-left: 20px;
}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<div class="content-panel">


			<div class="title">
				<?php echo e($role->name); ?> Permissions 
			</div>

			<div class="content content-large" style="display: inline;">
				<?php echo Form::open(['route' => 'cms.users.update-user-permissions','class'=>'role-permission']); ?>

				<?php echo Form::hidden('role_id',$role->id); ?>

				
				<ul class="perms small-block-grid-2 medium-block-grid-3 large-block-grid-5">

					<?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name=>$actions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<li>
						
						
						<h5 style="text-transform: capitalize; font-size: 0.995rem"><?php echo Form::checkbox('all',null,null,['class'=>'checkall']); ?> <?php echo e(str_replace('_',' ',substr(strrchr($name,'.'),1))); ?></h5>
						<ul style="list-style: none">
							<?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><label><?php echo Form::checkbox('permissions[]',$action->id,$action->permission_id); ?> <?php echo e($action->action); ?></label></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</li>
					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				
				
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


<?php $__env->startSection('scripts'); ?>

<script type="text/javascript" charset="utf-8">
	$( document ).ready(function() {
		$('.perms').on('click','.checkall',function(){
			$(this).parent().parent().find('ul li input').prop('checked',$(this).is(':checked'))
		});
	});
	
	
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>