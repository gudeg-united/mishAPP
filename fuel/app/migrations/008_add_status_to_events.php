<?php

namespace Fuel\Migrations;

class Add_status_to_events
{
	public function up()
	{
		\DBUtil::add_fields('events', array(
			'status' => array('type' => 'boolean'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('events', array(
			'status'

		));
	}
}