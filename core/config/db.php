<?php

    /**
     * Конфиг работы с БД
     *
     * @author Zmi
     */


    $g_config['dbSimple']                     = array();
    $g_config['dbSimple']['logDbError']       = true;
    $g_config['dbSimple']['dbLogFile']        = BASEPATH . 'tmp/log_db.txt';

    // Имена БД объектов, будут хранится в $g_databases->dbName подключение к БД задается через DSN
    // Работа с БД происходит при помощи DbSimple (http://dklab.ru/lib/DbSimple/)
    $g_config['dbSimple']['databases'] = array
    (
    );
    
    $g_config['pdo']['databases'] = array
    (
        'db' => array(
            'dsn' => 'mysql:host=94.23.92.103;dbname=health;charset=utf8',
            'login' => 'health',
            'pwd' => 'Z46aB2Rdf5S'
        ),
    );
    
?>