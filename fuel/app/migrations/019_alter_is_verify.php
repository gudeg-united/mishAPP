<?php

namespace Fuel\Migrations;

class Alter_is_verify
{
    public function up()
    {
        \DBUtil::add_fields('reports', array(
            'is_verify' => array('type' => 'boolean'),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('reports', array(
            'is_verify'
        ));
    }
}