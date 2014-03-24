<div class="safariPointsOfInterests view">
<h2><?php echo __('Safari Points Of Interest'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($safariPointsOfInterest['SafariPointsOfInterest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($safariPointsOfInterest['SafariPointsOfInterest']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Safari'); ?></dt>
		<dd>
			<?php echo $this->Html->link($safariPointsOfInterest['Safari']['name'], array('controller' => 'safaris', 'action' => 'view', $safariPointsOfInterest['Safari']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($safariPointsOfInterest['SafariPointsOfInterest']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($safariPointsOfInterest['SafariPointsOfInterest']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Radius'); ?></dt>
		<dd>
			<?php echo h($safariPointsOfInterest['SafariPointsOfInterest']['radius']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Safari Points Of Interest'), array('action' => 'edit', $safariPointsOfInterest['SafariPointsOfInterest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Safari Points Of Interest'), array('action' => 'delete', $safariPointsOfInterest['SafariPointsOfInterest']['id']), null, __('Are you sure you want to delete # %s?', $safariPointsOfInterest['SafariPointsOfInterest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Safari Points Of Interests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari Points Of Interest'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Safaris'), array('controller' => 'safaris', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari'), array('controller' => 'safaris', 'action' => 'add')); ?> </li>
	</ul>
</div>
