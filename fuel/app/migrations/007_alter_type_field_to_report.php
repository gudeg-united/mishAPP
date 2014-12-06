<?php

namespace Fuel\Migrations;

class Alter_type_field_to_report
{
    public function up()
    {
        \DBUtil::add_fields('reports', array(
            'event_id' => array('constraint' => 11, 'type' => 'int')
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('reports', 'event_id');
    }
}