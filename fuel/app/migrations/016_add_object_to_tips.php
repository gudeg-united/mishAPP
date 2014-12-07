<?php

namespace Fuel\Migrations;

class Add_object_to_tips
{
	public function up()
	{
		\DBUtil::add_fields('tips', array(
			'object' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('tips', array(
			'object'

		));
	}
}