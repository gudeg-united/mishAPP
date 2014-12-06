<h2>Viewing <span class='muted'>#<?php echo $tip->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $tip->title; ?></p>
<p>
	<strong>Event:</strong>
	<?php echo $tip->event; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $tip->content; ?></p>

<?php echo Html::anchor('tips/edit/'.$tip->id, 'Edit'); ?> |
<?php echo Html::anchor('tips', 'Back'); ?>