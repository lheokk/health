 <?php if (is_object($g_adminAuth) && $g_adminAuth->IsAuth(true)): ?>
        <head>
            <link rel="stylesheet" type="text/css" href="<?= Root('i/css/admin/menu.css') ?>" />
        </head>
       
        <div class="admin-menu" style="height: 20px;">
            <div style="color: white; text-align: right;" >
                <?= isset($_SESSION['elite_admin_login']) ? "Вы авторизованы как: " . $_SESSION['elite_admin_login'] : ''?>
                <a class="push-right" href="<?= SiteRoot('admin/logout') ?>">Выход</a>
            </div>
        </div>
    <?php endif; ?>