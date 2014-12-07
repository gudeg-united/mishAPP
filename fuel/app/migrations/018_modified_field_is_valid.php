<?php

namespace Fuel\Migrations;

class Modified_field_is_valid
{
  public function up()
  {
    \DBUtil::modify_fields('reports', array(
      'is_valid' => array('type' => 'boolean', 'null' => true, 'default' => false)
    ));
  }

  public function down()
  {
    \DBUtil::modify_fields('reports', array(
      'is_valid' => array('type' => 'boolean', 'null' => false, 'default' => false)
    ));
  }
}
