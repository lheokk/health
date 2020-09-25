<?php IncludeCom('admin/dashboard/modal')?>
<div class="container-fluid">
    <div class="row-fluid">
		<!--Left part of page-->
		<div class="span6">
			<!--кнопошки-->
			<?php IncludeCom('admin/dashboard/big_buttons')?>
			<!--кнопошки закончились-->
			
			<!--окошканама System status-->
			<?php IncludeCom('admin/dashboard/system_status')?>
			<!--окошканама System status закончилось-->
			
			<!--таблица-->
			<?php IncludeCom('admin/dashboard/table')?>
			<!--таблица закончилась-->
		</div>
		
		<!--Right part of page-->
		<div class="span6">
			<?php IncludeCom('admin/dashboard/server_status')?>
			<?php IncludeCom('admin/dashboard/comments')?>
		</div>
	</div>
</div>	