<?php

    /**
     * Инициализация подключей ко всем БД и подключение моделей
     *
     * @author Zmi
     */

    // Стартуем все БД
//    require_once BASEPATH . 'lib/Db/Db.php';
//    new Db();
    // Теперь должна быть переменная $g_databases где лежат все БД

    require_once BASEPATH . 'lib/Db/Db_pdo.php';
    new Db_pdo();

    // Список подключаемых моделей
    require_once BASEPATH . 'model/Model.php';
?>