<head>   
    <link rel="stylesheet" type="text/css" href="<?= Root('i/css/admin/users.css')?>" />
</head>    

<h3>
    Смена пароля пользователя <?= $user->login?>:
</h3>
<div class="boostrap-form" id="create_user_page">
    <form action="<?= GetCurUrl()?>" method="POST" class="form-horizontal">
        <?= $msg?>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Новый пароль</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="Новый пароль" name="pass">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Пароль еще раз</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="Пароль еще раз" name="confirm_pass">
            </div>
        </div>
        <div class="control-group" style="text-align: center">
            <a href="<?= SiteRoot('admin/users/index') ?>"><input type="button" value="Назад" class="btn" /></a>
            <button type="submit" class="btn">Изменить</button>
        </div>
        <input type="hidden" name="change_pass">
     </form>
</div>