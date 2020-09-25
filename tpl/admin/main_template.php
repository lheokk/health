<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>Административная панель IndexPro Design</title>

	<link href="<?= Root('i/css/admin/application.css')?>" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?= Root('i/css/admin/prettify.css')?>" media="screen" rel="stylesheet" type="text/css" />
	<script src="<?= Root('i/js/admin/jquery-1.8.js')?>" type="text/javascript"></script>
	<script src="<?= Root('i/js/admin/application.js')?>" type="text/javascript"></script>
	<script src="<?= Root('i/js/admin/docs.js')?>" type="text/javascript"></script>
	<script src="<?= Root('i/js/admin/docs_charts.js')?>" type="text/javascript"></script>
	<script src="<?= Root('i/js/admin/documentation.js')?>" type="text/javascript"></script>
	<script src="<?= Root('i/js/admin/prettify.js')?>" type="text/javascript"></script>
	
	<script src="<?= Root('i/js/admin/menu.js')?>" type="text/javascript"></script>
	<script src="<?= Root('i/js/admin/main.js')?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?= Root('i/js/admin/noty/jquery.noty.js') ?>"></script>
	<script type="text/javascript" src="<?= Root('i/js/admin/noty/layouts/bottom.js') ?>"></script>
	<script type="text/javascript" src="<?= Root('i/js/admin/noty/themes/default.js') ?>"></script>
	<script type="text/javascript" src="<?= Root('i/js/admin/ckeditor/ckeditor.js') ?>"></script>
  <!--[if lt IE 9]>
<script src="../../javascripts/html5shiv.js" type="text/javascript"></script><script src="../../javascripts/excanvas.js" type="text/javascript"></script><script src="../../javascripts/iefix.js" type="text/javascript"></script><link href="../../stylesheets/iefix.css" media="screen" rel="stylesheet" type="text/css" /><![endif]-->

  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
</head>
<body>
	<!--First menu-->
		<?php IncludeCom('admin/menu/menu')?>
	<!--Main container-->	
	<section id="main">
	
		<!--Content-->
		<div class="container-fluid" style="margin-top: 20px;">	
			<div class="container-fluid">
				<div class="row-fluid">
			<?= $content?>
				</div>
			</div>	
			<!--Footer-->
			<?php IncludeCom('admin/footer')?>
		</div>
	</section>
<!--Шаблоны нотификаторов, вызов хранится в notifications_demo.js, а также можно просмотреть в сгенериной application.js-->
<script type="text/html" id="template-notification">
  <div class="notification animated fadeInLeftMiddle fast{{ item.itemClass }}">
    <div class="left">
      <div style="background-image: url({{ item.imagePath }})" class="{{ item.imageClass }}"></div>
    </div>
    <div class="right">
      <div class="inner">{{ item.text }}</div>
      <div class="time">{{ item.time }}</div>
    </div>

    <i class="icon-remove-sign hide"></i>
  </div>
</script>
<script type="text/html" id="template-notifications">
  <div class="container">
    <div class="row" id="notifications-wrapper">
      <div id="notifications" class="{{ bootstrapPositionClass }} notifications animated">
        <div id="dismiss-all" class="dismiss-all button blue">Закрыть</div>
        <div id="content">
          <div id="notes"></div>
        </div>
      </div>
    </div>
  </div>
</script>
<!--Концились шаблонама-->
	
<script type="text/javascript">
    prettyPrint()
</script>
</body>
</html>