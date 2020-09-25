<?php

    function EditContent($content)
    {
        ob_start();
        IncludeCom('tpl_coms/articles');
        $c = ob_get_clean();
        
        $content = str_replace('<!--ARTICLES-->', $c, $content);
        
        ob_start();
        IncludeCom('tpl_coms/contacts');
        $c = ob_get_clean();
        
        $content = str_replace('<!--CONTACTS-->', $c, $content);
        
        $content = str_replace('/avtonovosti/', '/post/list', $content);
        
        return $content;
    }

?>