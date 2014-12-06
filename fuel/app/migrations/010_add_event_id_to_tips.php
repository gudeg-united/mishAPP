<?php

namespace Fuel\Migrations;

class Add_event_id_to_tips
{
	public function up()
	{
		\DBUtil::add_fields('tips', array(
			'event_id' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('tips', array(
			'event_id'

		));
	}
}