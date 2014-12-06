<h2>Viewing #<?php echo $tip->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $tip->title; ?></p>
<p>
	<strong>Event:</strong>
    <?php echo $event('name', $tip->events); ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $tip->content; ?></p>

<?php echo Html::anchor('admin/tips/edit/'.$tip->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/tips', 'Back'); ?>