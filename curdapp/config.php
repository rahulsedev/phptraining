<?php
    session_start();
    define('DATABASE_CONFIG', [
        'HOST' => '127.0.0.1',
        'USR' => 'root',
        'PASS' => '',
        'DB_NAME' => 'curdapp'
    ]);
    function pr($dt) { echo'<pre>';print_r ($dt);}
?>