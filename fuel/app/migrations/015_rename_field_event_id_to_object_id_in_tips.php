<?php

namespace Fuel\Migrations;

class Rename_field_event_id_to_object_id_in_tips
{
	public function up()
	{
		\DBUtil::modify_fields('tips', array(
			'event_id' => array('name' => 'object_id', 'type' => 'int', 'constraint' => 11)
		));
	}

	public function down()
	{
	\DBUtil::modify_fields('tips', array(
			'object_id' => array('name' => 'event_id', 'type' => 'int', 'constraint' => 11)
		));
	}
}