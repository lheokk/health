<?php

    function pdo_insert_fields($array)
    {
        return '`' . implode('`,`', array_keys($array)) . '`';
    }
    
    function pdo_insert_placeholders($array)
    {
        return ':' . implode(',:', array_keys($array));
    }
    
    function pdo_insert_get_params($array)
    {
        $ret = array();
        foreach ($array as $key => $val)
        {
            $ret[':' . $key] = $val;
        }
        return $ret;
    }
    
    function pdo_update_set($data)
    {
        $ret = '';
        foreach ($data as $key => $val)
        {
            $ret .= "`$key` = :$key,";
        }
        
        return substr($ret, 0, -1);
    }
    
    function pdo_update_get_params($array)
    {
        return pdo_insert_get_params($array);
    }
    
    function pdo_id_as_array_key($array, $k = 'id')
    {
        $t = array();
        foreach($array as $key => $val)
            $t[$val[$k]] = $val;
        return $t;
    }

?>