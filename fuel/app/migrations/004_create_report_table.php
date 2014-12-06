<?php

namespace Fuel\Migrations;

class Create_report_table
{
    public function up()
    {
        \DBUtil::create_table('report_table', array(
            'id' => array('constraint' => 11,'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'long' => array('constraint' => array(10,8),'type' => 'decimal', 'unsigned' => true),
            'lat' => array('constraint' => array(11,8),'type' => 'decimal', 'unsigned' => true),
            'uid' => array('constraint' => 255, 'type' => 'varchar'),
            'created_at' => array('type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('report_table');
    }
}