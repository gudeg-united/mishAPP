<?php

namespace Fuel\Migrations;

class Alter_city_location
{
    public function up()
    {
        \DBUtil::add_fields('reports', array(
            'location' => array('type' => 'varchar', 'constraint' => 255),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('reports', array(
            'location'
        ));
    }
}