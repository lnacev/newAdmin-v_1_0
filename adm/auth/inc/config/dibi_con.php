<?php dibi::connect(array(
    'driver'   => 'mysql',
    'host'     => 'localhost', /* *** change on prod ip or localhost *** */
    'username' => '*****', /* *** change on prod username *** */
    'password' => '******', /* *** change on prod password *** */
    'database' => '******', /* *** change on prod db name *** */
    'charset'  => 'utf8',
    'profiler' => array('file' => 'inc/log/log.sql', 'run' => TRUE),//nastavenie profilera, ak treba
)); ?>
