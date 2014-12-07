<?php

namespace Fuel\Migrations;

class Alter_events
{
	public function up()
	{
		\DBUtil::modify_fields('events', array(
        'created_at' => array('type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')),
        'updated_at' => array('type' => 'datetime'),
    ));
	}

	public function down()
	{
		\DBUtil::modify_fields('events', array(
        'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
        'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
    ));
	}
}
