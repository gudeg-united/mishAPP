<?php

namespace Fuel\Migrations;

class Alter_data_type_lat_long_reports
{
    public function up()
    {
        \DBUtil::modify_fields('reports', array(
            'long' => array('name' => 'longitude', 'type' => 'decimal', 'constraint' => array(10,8)),
            'lat' => array('name' => 'latitude', 'type' => 'decimal', 'constraint' => array(11,8)),
        ));
    }

    public function down()
    {
        \DBUtil::modify_fields('reports', array(
            'longitude' => array('name' => 'long', 'type' => 'decimal', 'constraint' => array(10,8) ),
            'latitude' => array('name' => 'lat', 'type' => 'decimal', 'constraint' => array(11,8)),
        ));
    }
}
