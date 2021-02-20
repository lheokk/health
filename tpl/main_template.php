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
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/style.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= Root('i/css/megamenu.css') ?>" />

        <!-- карусель тут подкюлчатеся -->
        <link rel="stylesheet" href="<?= Root('i/css/owl.carousel.min.css') ?>">

        <link rel="stylesheet" href="<?= Root('i/css/owl.theme.default.min.css') ?>">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="<?= Root('i/js/owl.carousel.min.js') ?>"></script>
        <script src="<?= Root('i/js/owl.autoplay.js') ?>"></script>

        <script type="text/javascript" src="<?= Root('i/js/main.js') ?>"></script>

        <!-- extraPacker -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <style> .full {width: 100%; height: auto}</style>

        <?= $content ?>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="<?= Root('i/js/megamenu.js') ?>"></script>

</body>
</html>