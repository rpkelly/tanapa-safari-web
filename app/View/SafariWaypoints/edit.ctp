<div class="safariWaypoints form">
<?php echo $this->Form->create('SafariWaypoint'); ?>
	<fieldset>
		<legend><?php echo __('Edit Safari Waypoint'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sequence');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('safari_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SafariWaypoint.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SafariWaypoint.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Safari Waypoints'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Safaris'), array('controller' => 'safaris', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari'), array('controller' => 'safaris', 'action' => 'add')); ?> </li>
	</ul>
</div>
