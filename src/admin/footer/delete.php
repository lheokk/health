<?php

    $id = Get('id', -1);
    $footer = new Footer($id);
    $footer->Delete();
    
    Location('/admin/footer/index');

?>