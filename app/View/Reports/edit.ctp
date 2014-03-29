<div class="reports form">
<?php echo $this->Form->create('Report'); ?>
	<fieldset>
		<legend><?php echo __('Edit Report'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('report_type_id');
		echo $this->Form->input('content');
		echo $this->Form->input('time');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('user_id');
		echo $this->Form->input('report_media_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Report.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Report.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Report Types'), array('controller' => 'report_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report Type'), array('controller' => 'report_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
	</ul>
</div>
