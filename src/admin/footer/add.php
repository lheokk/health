<?php

    if (!empty($_POST['footer']))
    {
        $footer = (Post('id', false)) ? new Footer(Post('id')) : new Footer();
        $footer->text = $_POST['footer'];
        Location(GetCurUrl());
    }
    
    if (Get('edit', false))
    {
        $footer = new Footer(Get('edit'));
    }

?>