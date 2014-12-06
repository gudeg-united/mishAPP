<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($tip) ? $tip->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>

        <div class="form-group">
			<?php echo Form::label("Object", 'object', array('class'=>'control-label')); ?>

            <?php echo Form::input('object', Input::post('object', isset($tip) ? $tip->object : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Object')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Event', 'event', array('class'=>'control-label')); ?>

            <?php echo Form::select('object_id', Input::post('object_id', isset($tip->object_id) ? $tip->object_id : ''), $events, array('class' => 'span6')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Content', 'content', array('class'=>'control-label')); ?>

            <?php echo Form::textarea('content', Input::post('content', isset($tip->content) ? $tip->content : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Content')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>