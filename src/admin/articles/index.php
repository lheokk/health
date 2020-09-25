<?php

    $msg = null;
    $err = array();
    
    
    if (Post('save'))
    {
        $head           = Post('head', false);
        $text           = $_POST['text'];
        
        $title          = Post('title', false);
        $description    = Post('description', '');
        $date           = (empty($_POST['date'])) ? time() : strtotime($_POST['date']);
        
        $image_preview  = Post('image', false);
        
        if (empty($text))
            $err[] = 'Текст новости не должен быть пустым';
        
        if (!$title)
            $err[] = 'Заголовок не должен быть пустым';
        
        if (empty($err))
        {
            $news_id = Post('id', false);
            
            $_news              = ($news_id) ? new News($news_id) : new News();
            $_news->name        = $head;
            $_news->text        = $text;
            $_news->title       = $title;
            $_news->description = $description;
            $_news->time        = $date;
            $_news->link        = Post('link');
            
            if (!empty($_FILES['image']['tmp_name']))
            {
                include_once BASEPATH . 'lib/WideImage/WideImage.php';

                $image = WideImage::load($_FILES['image']['tmp_name']);
                $image_name = md5($_FILES['image']['tmp_name'] . time()) . '.' . GetExt($_FILES['image']['name']);

                $image->resize(220, 130, 'fill')->saveToFile(BASEPATH . 'upl/' . $image_name);
                
                $_news->img = $image_name;
            }
            
            unset($_news);
            
            $msg = 'Новость добавлена';
        }
    }
    
    if (!empty($_GET['a']) && $_GET['a'] == 'delete')
    {
        $id = (int)$_GET['id'];
        
        /* удаляем новость и картинку к ней */
        $_news = new News($id);
        if (is_file(BASEPATH . 'upl/' . $_news->img))
            unlink(BASEPATH . 'upl/' . $_news->img);
        $_news->Delete();
        unset($_news);
    }
    
    $id = false;
    if (!empty($_GET['a']) && $_GET['a'] == 'edit')
    {
        $id = (int)$_GET['id'];
    }
    
    $_news = ($id) ? new News($id) : new News();
    $data = $_news->All(false, true);

?>