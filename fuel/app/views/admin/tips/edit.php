<h2>Editing Tip</h2>
<br>

<?php echo render('admin/tips/_form'); ?>
<p>
	<?php echo Html::anchor('admin/tips/view/'.$tip->id, 'View'); ?> |
	<?php echo Html::anchor('admin/tips', 'Back'); ?></p>
