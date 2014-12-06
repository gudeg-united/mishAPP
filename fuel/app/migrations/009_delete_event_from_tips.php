<?php

namespace Fuel\Migrations;

class Delete_event_from_tips
{
	public function up()
	{
		\DBUtil::drop_fields('tips', array(
			'event'

		));
	}

	public function down()
	{
		\DBUtil::add_fields('tips', array(
			'event' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}
}