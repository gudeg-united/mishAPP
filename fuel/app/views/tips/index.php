<h2>Listing <span class='muted'>Tips</span></h2>
<br>
<?php if ($tips): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Event</th>
			<th>Content</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tips as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
            <td><?php echo $event("name", $item->events); ?></td>
			<td><?php echo $item->content; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('tips/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('tips/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('tips/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tips.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('tips/create', 'Add new Tip', array('class' => 'btn btn-success')); ?>

</p>
