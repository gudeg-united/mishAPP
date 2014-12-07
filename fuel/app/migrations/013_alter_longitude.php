<?php

namespace Fuel\Migrations;

class Alter_longitude
{
	public function up()
	{
		\DBUtil::modify_fields('reports', array(
			'longitude' => array('type' => 'decimal', 'constraint' => array(11,8)),
		));
	}

	public function down()
	{
		\DBUtil::modify_fields('events', array(
			'longitude' => array('type' => 'decimal', 'constraint' => array(10,8)),
		));
	}
}