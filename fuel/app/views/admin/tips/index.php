<h2>Listing Tips</h2>
<br>
<?php if ($tips): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Event</th>
			<th>Content</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tips as $item): ?>		
        <tr>

			<td><?php echo $item->title; ?></td>           
            <td><?php echo $item->object; ?></td>
            <td><?php echo $event("name", $item->events); ?></td>
			<td><?php echo $item->content; ?></td>
			<td>
				<?php echo Html::anchor('admin/tips/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/tips/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/tips/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tips.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/tips/create', 'Add new Tip', array('class' => 'btn btn-success')); ?>

</p>
