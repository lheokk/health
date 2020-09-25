<?php

    $_news = new News();
    $data = $_news->GetDataByLink($link);
    if (empty($data))
    {
        IncludeCom('404');
        ExitCom();
    }
    else
    {
        $g_title = $data['title'];
        $g_description = $data['description'];
    }

?>