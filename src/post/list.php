<?php

    $page = Get('page', 1);
    $perPage = 1;
    
    $_news = new News();
    $t = $_news->GetNewsPage(($page-1)*$perPage, $perPage);
    $total = $t['total'];
    $data = $t['data'];
    
    if (empty($data))
    {
        IncludeCom('404');
        ExitCom();
    }
    
    $g_lang['m_title'] = 'Список статей портала';
    $g_lang['m_description'] = 'Самые актуальные и интересные новости со всего мира на страницах нашего портала';

?>