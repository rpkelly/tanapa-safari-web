<div class="safariWaypoints index">
	<h2><?php echo __('Safari Waypoints'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sequence'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('safari_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($safariWaypoints as $safariWaypoint): ?>
	<tr>
		<td><?php echo h($safariWaypoint['SafariWaypoint']['id']); ?>&nbsp;</td>
		<td><?php echo h($safariWaypoint['SafariWaypoint']['sequence']); ?>&nbsp;</td>
		<td><?php echo h($safariWaypoint['SafariWaypoint']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($safariWaypoint['SafariWaypoint']['longitude']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($safariWaypoint['Safari']['name'], array('controller' => 'safaris', 'action' => 'view', $safariWaypoint['Safari']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $safariWaypoint['SafariWaypoint']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $safariWaypoint['SafariWaypoint']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $safariWaypoint['SafariWaypoint']['id']), null, __('Are you sure you want to delete # %s?', $safariWaypoint['SafariWaypoint']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Safari Waypoint'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Safaris'), array('controller' => 'safaris', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Safari'), array('controller' => 'safaris', 'action' => 'add')); ?> </li>
	</ul>
</div>
