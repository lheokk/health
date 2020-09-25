<div class="span2"></div>
<div class="span8">
<div class="box" style="position:relative;">
	<div class="tab-header">
		Список пользователей административной панели:
	</div>
			<table class="table table-striped table-bordered box">
				  <thead>
					  <tr>
						<th>Логин</th>
						<th>Email</th>
						<th>Дата регистрации</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php foreach($admins['users'] as $v):?>
					  <tr>
						<td><?= $v['login']?></td>
						<td><?= $v['mail']?></td>
						<td><?= FormatDate($v['regdate'])?></td>
					  </tr>
					  <?php endforeach;?>
				  </tbody>
				  <tfoot>
					  <tr>
						<td colspan="3">
						  
						</td>
					  </tr>
				  </tfoot>
			</table>
</div>
		</div>