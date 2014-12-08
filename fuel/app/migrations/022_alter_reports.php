<?php

namespace Fuel\Migrations;

class Alter_reports
{
    public function up()
    {
        \DBUtil::drop_fields('reports', array(
            'location'
        ));

        \DBUtil::add_fields('reports', array(
            'ip_address' => array('type' => 'varchar', 'constraint' => 15, 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::add_fields('reports', array(
            'location' => array('type' => 'varchar', 'constraint' => 255),
        ));

        \DBUtil::drop_fields('reports', array(
            'ip_address'
        ));        
    }
}
