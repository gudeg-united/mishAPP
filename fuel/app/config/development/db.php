<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
    'default' => array(
        'type'           => 'mysql',
        'connection'  => array(
            'hostname'       => 'localhost',
            'port'           => '3306',
            'database'       => 'mishapp_web',
            'username'       => 'root',
            'password'       => 'root',
            'persistent'     => false,
            'compress'       => false,
        ),
        'charset'        => 'utf8',
    ),
);