<head>   
    <link rel="stylesheet" type="text/css" href="<?= Root('i/css/admin/users.css')?>" />
</head>    

<h3>
    Создание пользователя:
</h3>
<div class="boostrap-form" id="create_user_page" >
    <form action="<?= GetCurUrl()?>" method="POST" class="form-horizontal">
        <?= $msg?>
        <div class="control-group">
            <label class="control-label" for="inputLogin">Логин</label>
            <div class="controls">
              <input type="text" id="inputLogin" placeholder="Логин" name="login">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputEmail">Электронный адрес</label>
            <div class="controls">
              <input type="email" id="inputEmail" placeholder="Электронный адрес" name="mail">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Пароль</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="Пароль" name="pass">
            </div>
        </div>
        <div class="control-group" style="text-align: center">
            <a href="<?= SiteRoot('admin/users/index') ?>"><input type="button" value="Назад" class="btn" /></a>
            <button type="submit" class="btn">Добавить</button>
        </div>
        <input type="hidden" name="create_user">
    </form>
</div>
