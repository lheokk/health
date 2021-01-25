<?php

    $msg = null;
    $err = array();
    $edit = false;
    $create = false;
    $id = false;

    if (Post('save'))
    {
        $head_ru            = Post('head_ru', false);
        $link_ru            = Post('link_ru', false);
        $text_ru            = $_POST['text_ru'];
        
        $title_ru           = Post('title_ru', false);
        $keywords_ru        = Post('keywords_ru', false);
        $description_ru     = Post('description_ru', '');
        $date               = time();
        
        if (empty($text_ru))
            $err[] = 'Текст новости не должен быть пустым';
        
        if (!$title_ru)
            $err[] = 'Заголовок не должен быть пустым';
        
        if (empty($err))
        {
            $page_id = Post('id', false);
            
            $_pages                 = ($page_id) ? new Pages($page_id) : new Pages();
            $_pages->head        = $head_ru;
            $_pages->link        = $link_ru;
            $_pages->text        = $text_ru;
            $_pages->title       = $title_ru;
            $_pages->description = $description_ru;
            $_pages->keywords    = $keywords_ru;
            $_pages->gallery_id  = Post('gallery_id', null);
            
            if (!$page_id)
                $_pages->stamp      = $date;
            
            unset($_pages);
            
            $msg = ($page_id) ? 'Страница изменена' : 'Страница добавлена';
        }
    }
    
    if (!empty($_GET['a']) && $_GET['a'] == 'delete')
    {
        $id = (int)$_GET['id'];
        
        /* удаляем новость и картинку к ней */
        $_pages = new Pages($id);
        $_pages->Delete();
        unset($_pages);
        loc('/admin/articles/index');
    }
    
    if (!empty($_GET['a']) && $_GET['a'] == 'edit')
    {
        $id = (int)$_GET['id'];
        $_page = new Pages($id);
    }