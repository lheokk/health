<?php
    
    if($_FILES['upload'])
    {
        if (($_FILES['upload'] == "none") || (empty($_FILES['upload']['name'])) )
        {
            $message = "Вы не выбрали файл";
        }
        else if ($_FILES['upload']["size"] == 0 || $_FILES['upload']["size"] > 2050000)
        {
            $message = "Размер файла не соответствует нормам";
        }
        else if (($_FILES['upload']["type"] != "image/jpeg") && ($_FILES['upload']["type"] != "image/jpeg") && ($_FILES['upload']["type"] != "image/png"))
        {
            $message = "Допускается загрузка только картинок JPG и PNG.";
        }
        else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
        {
            $message = "Что-то пошло не так. Попытайтесь загрузить файл ещё раз.";
        }
        else
        {
            $name = rand(1, 1000) . '-' . md5($_FILES['upload']['name']) . '.' . GetExt($_FILES['upload']['name']);
            
            move_uploaded_file($_FILES['upload']['tmp_name'], BASEPATH . "upl/" . $name);
            $full_path = '/upl/' . $name;
            $message = "Файл загружен";
            
            $size = getimagesize(BASEPATH . 'upl/' . $name);

            if ($size[0] < 50 OR $size[1] < 50){
                unlink(BASEPATH . 'upl/' . $name);
                $message = "Файл не является допустимым изображением";
                $full_path = "";
            }
        }
    $callback = $_REQUEST['CKEditorFuncNum'];
    echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("' . $callback . '", "' . $full_path . '", "' . $message . '" );</script>';
    exit();
}
?>