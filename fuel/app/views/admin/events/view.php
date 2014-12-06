<h2>Viewing #<?php echo $event->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $event->name; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $status[$event->status]; ?></p>

<?php echo Html::anchor('admin/events/edit/'.$event->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/events', 'Back'); ?>