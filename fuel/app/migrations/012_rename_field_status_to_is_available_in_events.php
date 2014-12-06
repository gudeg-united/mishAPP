<?php

namespace Fuel\Migrations;

class Rename_field_status_to_is_available_in_events
{
	public function up()
	{
		\DBUtil::modify_fields('events', array(
			'status' => array('name' => 'is_available', 'type' => 'tinyint', 'default' => true)
		));
	}

	public function down()
	{
	\DBUtil::modify_fields('events', array(
			'is_available' => array('name' => 'status', 'type' => 'tinyint', 'default' => true)
		));
	}
}
