<style>
	.form_note
	{
		padding: 10px 0px 10px 0px;
	}
</style>

<div class="span3"></div>
<div class="span5 box" style="text-align: center;">
	<div class="tab-header">Создание нового пользователя</div>
	<form action="<?= GetCurUrl()?>" method="POST" class="form-horizontal">
		<div class="form_note">Логин</div>
		<div>
			<input type="text" name="login" placeholder="Логин" />
		</div>
		<div class="form_note">Электронный адрес</div>
		<div>
			<input type="email" name="email"  placeholder="Электронный адрес" />
		</div>
		<div class="form_note">Пароль</div>
		<div>
			<input type="text" name="pass"  placeholder="Пароль" />
		</div>
		<div class="form_note">Повторите пароль</div>
		<div>
			<input type="text" name="confirm_pass" placeholder="Повторите пароль" />
		</div>
        <div style="text-align: center; margin: 7px">
			<a href="<?= SiteRoot('admin/users/index') ?>"><input type="button" value="Назад" class="button red" /></a>
            <input type="submit" class="button green" value="Добавить" />
        </div>
		
        <input type="hidden" name="create_user">
    </form>
</div>
<?= $msg?>