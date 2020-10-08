<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= $g_config['charset'] ?>" />

        <title><?= $g_title ?></title>
        <?php if (!empty($g_description)): ?>
            <meta name="description" content="<?= $g_description ?>" />
        <?php endif; ?>
        <?php if (!empty($g_keywords)): ?>
            <meta name="keywords" content="<?= $g_keywords ?>" />
        <?php endif; ?>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="<?= Root('favicon.ico') ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?= Root('favicon.ico') ?>" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/normalize.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/dev/funcs.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/main.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/styyle.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/megamenu.css') ?>" />

        <!-- карусель тут подкюлчатеся -->
        <link rel="stylesheet" href="<?= Root('i/css/owl.carousel.min.css') ?>">

        <link rel="stylesheet" href="<?= Root('i/css/owl.theme.default.min.css') ?>">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="<?= Root('i/js/owl.carousel.min.js') ?>"></script>

        <script type="text/javascript" src="<?= Root('i/js/main.js') ?>"></script>

        <!-- extraPacker -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="star" style="float: left; margin-right: 15px;"></div>
                    <div class='rusmed' style="line-height: 50px; float: left; font-weight: bold; letter-spacing: 5px;">РУСМЕДЗДРАВ</div>
                    <div style="clear: both;"></div>
                </div> 

                <div class="col-5">
                    <div class="menu-container desktop">
                        <div class="menu">
                            <ul>
                                <li><a href="#">О центре</a></li>
                                <li><a href="#">Услуги</a></li>
                                <li><a href="#">Акции</a></li>
                                <li><a href="#">Партнерство</a></li>
                            </ul>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div> 

                <div class="col-3">
                    <div class="menu-container">
                        <div class="menu ">
                            <ul>
                                <li class="mobile"><a href="#">О центре</a></li>
                                <li class="mobile"><a href="#">Услуги</a></li>
                                <li class="mobile"><a href="#">Акции</a></li>
                                <li class="mobile"><a href="#">Партнерство</a></li>
                                <li><a href="#">Карьера</a></li>
                                <li><a href="#">Блог</a></li>
                            </ul>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        

</body>
</html>