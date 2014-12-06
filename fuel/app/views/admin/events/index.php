<h2>Listing Events</h2>
<br>
<?php if ($events): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($events as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
				<?php echo Html::anchor('admin/events/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/events/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/events/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Events.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/events/create', 'Add new Event', array('class' => 'btn btn-success')); ?>

</p>
