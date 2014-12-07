<?php

namespace Fuel\Migrations;

class Alter_is_valid
{
    public function up()
    {
        \DBUtil::add_fields('reports', array(
            'is_valid' => array('type' => 'boolean'),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('reports', array(
            'is_valid'
        ));
    }
}