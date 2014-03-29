<div class="safariWaypoints view">
<h2><?php echo __('Safari Waypoint'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($safariWaypoint['SafariWaypoint']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence'); ?></dt>
		<dd>
			<?php echo h($safariWaypoint['SafariWaypoint']['sequence']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($safariWaypoint['SafariWaypoint']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($safariWaypoint['SafariWaypoint']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Safari'); ?></dt>
		<dd>
			<?php echo $this->Html->link($safariWaypoint['Safari']['name'], array('controller' => 'safaris', 'action' => 'view', $safariWaypoint['Safari']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Safari Waypoint'), array('action' => 'edit', $safariWaypoint['SafariWaypoint']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Safari Waypoint'), array('action' => 'delete', $safariWaypoint['SafariWaypoint']['id']), null, __('Are you sure you want to delete # %s?', $safariWaypoint['SafariWaypoint']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Safari Waypoints'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari Waypoint'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Safaris'), array('controller' => 'safaris', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari'), array('controller' => 'safaris', 'action' => 'add')); ?> </li>
	</ul>
</div>
