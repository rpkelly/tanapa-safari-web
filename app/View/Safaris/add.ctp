<div class="safaris form">
<?php echo $this->Form->create('Safari'); ?>
	<fieldset>
		<legend><?php echo __('Add Safari'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('header_media_id');
		echo $this->Form->input('footer_media_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Safaris'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Header Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
	</ul>
</div>
