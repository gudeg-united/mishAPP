<h2>Editing <span class='muted'>Tip</span></h2>
<br>

<?php echo render('tips/_form'); ?>
<p>
	<?php echo Html::anchor('tips/view/'.$tip->id, 'View'); ?> |
	<?php echo Html::anchor('tips', 'Back'); ?></p>
