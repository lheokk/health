<head>   
    <link rel="stylesheet" type="text/css" href="<?= Root('i/css/admin/users.css')?>" />
</head>    

<h3>
    Редактирование данных пользователя:
</h3>
<div class="boostrap-form" id="create_user_page">
    <form action="<?= GetCurUrl()?>" method="POST" class="form-horizontal">
        <?= $msg?>
        <div class="control-group">
            <label class="control-label" for="inputLogin">Логин</label>
            <div class="controls">
              <input type="text" id="inputLogin" placeholder="Login" name="login" 
                     value="<?= $user->login?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputEmail">E-mail</label>
            <div class="controls">
              <input type="email" id="inputEmail" placeholder="Email" name="mail"
                     value="<?= $user->mail?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="group">Группа</label>
            <div class="controls">
              <input type="number" id="inputGroup" placeholder="Group" name="group"
                     value="<?= $user->group?>" min="1" />
            </div>
        </div>
        <div class="control-group" style="text-align: center">
            <a href="<?= SiteRoot('admin/users/index') ?>"><input type="button" value="Назад" class="btn"></a>
            <button type="submit" class="btn">Изменить</button>
        </div>
         <input type="hidden" name="create_user">
     </form>
</div>