	<link rel="stylesheet" href="<?= Root('i/js/dev/nivo-slider/themes/default/default.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?= Root('i/js/dev/nivo-slider/themes/light/light.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?= Root('i/js/dev/nivo-slider/themes/dark/dark.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?= Root('i/js/dev/nivo-slider/themes/bar/bar.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?= Root('i/js/dev/nivo-slider/nivo-slider.css')?>" type="text/css" media="screen" />
	<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider" style="max-height: 990px !important; ">
				<?php foreach($files AS $v):?>
					<img src="/upl/gallery/<?= $v['album']?>/<?= $v['file']?>" data-thumb="upl/gallery/<?= $v['album']?>/<?= $v['file']?>" alt="" title="<?= $v['desc'] != '' ? "#slide_" . $v['id'] : ''?>" />
				<?php endforeach;?>
            </div>
			<?php foreach($files AS $v):?>
				<?php if(!empty($v['desc'])):?>
					<div id="slide_<?= $v['id']?>" class="nivo-html-caption">
						<?= $v['desc']?>
					</div>
				<?php endif;?>
			<?php endforeach;?>
	</div>

    <script type="text/javascript" src="<?= Root('i/js/dev/nivo-slider/jquery.nivo.slider.js')?>"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>