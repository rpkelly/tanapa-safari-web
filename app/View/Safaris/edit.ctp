<div class="safaris form">
<?php echo $this->Form->create('Safari'); ?>
	<fieldset>
		<legend><?php echo __('Edit Safari'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Safari.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Safari.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Safaris'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Header Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
	</ul>
</div>
