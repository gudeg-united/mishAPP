<?php

namespace Fuel\Migrations;

class Modified_field_is_available
{
	public function up()
	{
		\DBUtil::modify_fields('events', array(
			'is_available' => array('type' => 'boolean', 'null' => true, 'default' => true)
		));
	}

	public function down()
	{
		\DBUtil::modify_fields('events', array(
			'is_available' => array('type' => 'boolean', 'null' => false, 'default' => true)
		));
	}
}
