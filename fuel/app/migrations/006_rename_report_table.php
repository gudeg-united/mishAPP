<?php

namespace Fuel\Migrations;

class Rename_report_table
{
    public function up()
    {
        \DBUtil::rename_table('report_table', 'reports');
    }

    public function down()
    {
        \DBUtil::rename_table('reports', 'report_table');
    }
}