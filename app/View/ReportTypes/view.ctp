<div class="reportTypes view">
<h2><?php echo __('Report Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reportType['ReportType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($reportType['ReportType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Report Type'), array('action' => 'edit', $reportType['ReportType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Report Type'), array('action' => 'delete', $reportType['ReportType']['id']), null, __('Are you sure you want to delete # %s?', $reportType['ReportType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Report Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($reportType['Report'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Report Type Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Report Media Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reportType['Report'] as $report): ?>
		<tr>
			<td><?php echo $report['id']; ?></td>
			<td><?php echo $report['report_type_id']; ?></td>
			<td><?php echo $report['content']; ?></td>
			<td><?php echo $report['time']; ?></td>
			<td><?php echo $report['latitude']; ?></td>
			<td><?php echo $report['longitude']; ?></td>
			<td><?php echo $report['user_id']; ?></td>
			<td><?php echo $report['report_media_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reports', 'action' => 'view', $report['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reports', 'action' => 'edit', $report['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reports', 'action' => 'delete', $report['id']), null, __('Are you sure you want to delete # %s?', $report['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
