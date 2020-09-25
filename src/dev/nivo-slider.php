<?php
	if(!isset($_GET['album']) || Get('album', '') == '')
	{
		die();
	}
	$g_config['isLoadInMainTpl']  = false;
	$gallery = new Gallery(); 
	$files = $gallery->GetFilesByAlbum(Get('album'));
?>