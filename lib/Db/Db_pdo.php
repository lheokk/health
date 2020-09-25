<?php

    class Db_pdo {
        
        public function __construct()
        {
            global $g_config;
            
            $dbs = $g_config['pdo']['databases'];

            // Собираем все объекты в $o
            $o = NULL;
            foreach ($dbs as $db => $conn)
            {
                @$o->$db = new PDO($conn['dsn'], $conn['login'], $conn['pwd']);
            }

            // Регистрируем все базы данных как объект $g_databases
            $GLOBALS['g_databases'] = $o;
        }
        
    }

?>