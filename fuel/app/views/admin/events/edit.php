<h2>Editing Event</h2>
<br>

<?php echo render('admin/events/_form'); ?>
<p>
	<?php echo Html::anchor('admin/events/view/'.$event->id, 'View'); ?> |
	<?php echo Html::anchor('admin/events', 'Back'); ?></p>
