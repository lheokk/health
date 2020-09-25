<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= $g_config['charset']?>" />

        <title><?= $g_title?></title>
        <?php if ( ! empty($g_description)):?>
            <meta name="description" content="<?= $g_description?>" />
        <?php endif;?>
        <?php if ( ! empty($g_keywords)):?>
            <meta name="keywords" content="<?= $g_keywords?>" />
        <?php endif;?>

        <link rel="icon" href="<?= Root('favicon.ico')?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?= Root('favicon.ico')?>" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/normalize.css')?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/dev/funcs.css')?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/main.css')?>" />

        <script type="text/javascript" src="<?= Root('i/js/jquery-1.7.2.min.js') ?>"></script>
        <script type="text/javascript" src="<?= Root('i/js/main.js') ?>"></script>
        <!-- extraPacker -->
    </head>
    <body>
        <div class="wrap">
            <?php IncludeCom('tpl_coms/head')?>
            <!--контент-->
            <div id="content">
                <?= $content?>
            </div>
            <!--контент закончился-->
            <?php IncludeCom('tpl_coms/footer')?>
        </div>
        </div>
    
    </body>
</html>