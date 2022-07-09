
<?php $__env->startSection('content'); ?>

<div class="content-panel">
	<div class="title">
		Contacts
	</div>
</div>

<div class="row collapse">
	<div class="large-8 medium-12 small-12 columns">
		
		<div class="content-panel">
			<div class="content content-large">
				<?php if(!$contacts): ?>

				<div class="content content-large empty-content">
					<div class="empty-text">
						<span><i class="ion ion-android-checkmark-circle"></i> No content found!</span>
					</div>
				</div>
				<?php else: ?>
				<table id="table">
					<thead>
						<tr>
							<th>Physical Address</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

						<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="show" data-item-value="<?php echo e($contact->id); ?>"><strong><?php echo $contact->physical_address; ?></strong></td>
							<td class="show" data-item-value="<?php echo e($contact->id); ?>"><strong><?php echo e($contact->email); ?></strong></td>
							<td>
								<!-- <?php echo link_to_route('cms.contacts.destroy', "", array($contact->id), array('data-method' => 'delete', 'data-confirm' => 'Are you Sure' ,'class' => 'ion ion-android-delete item-delete')); ?> -->
								<a href="<?php echo e(URL::route('cms.contacts.edit', $contact->id)); ?>" class="item-edit">Edit</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<?php echo $contacts->render(); ?>


				<?php endif; ?>



			</div> 
		</div>
		
	</div>
<!-- 
	 <div class="large-6 columns medium-12 small-12 columns">
		<div class="content-panel">
			<div class="title">
				Contacts
			</div>

			<div class="content">
				<?php echo Form::open(['route' => 'cms.contacts.store', 'method' => 'POST']); ?>


					<?php echo $__env->make('cms.contacts._form', ['submitButton' => "Save"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>  -->
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).foundation();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>