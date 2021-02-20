<?php

    $_cnf = new Config();
    
    if (Post('save', false))
    {
        if (!empty($_FILES['image']['tmp_name']))
        {
            include_once BASEPATH . 'lib/WideImage/WideImage.php';

            $image = WideImage::load($_FILES['image']['tmp_name']);
            $img = 'upl/' . md5($_FILES['image']['tmp_name'] . time()) . '.' . GetExt($_FILES['image']['name']);
            $image->resize(1140, 594, 'fill')->saveToFile(BASEPATH . $img);
        }
        $_cnf->SetConfig('main_banner', $img);
    }
    
    $banner = $_cnf->GetConfig('main_banner');
    

?>