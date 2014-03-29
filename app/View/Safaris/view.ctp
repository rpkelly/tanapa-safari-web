<div class="safaris view">
<h2><?php echo __('Safari'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($safari['Safari']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($safari['Safari']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($safari['Safari']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Header Media'); ?></dt>
		<dd>
			<?php echo $this->Html->link($safari['HeaderMedia']['id'], array('controller' => 'media', 'action' => 'view', $safari['HeaderMedia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Footer Media'); ?></dt>
		<dd>
			<?php echo $this->Html->link($safari['FooterMedia']['id'], array('controller' => 'media', 'action' => 'view', $safari['FooterMedia']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Safari'), array('action' => 'edit', $safari['Safari']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Safari'), array('action' => 'delete', $safari['Safari']['id']), null, __('Are you sure you want to delete # %s?', $safari['Safari']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Safaris'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Header Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
	</ul>
</div>
