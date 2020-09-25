
    <?php if (is_object($g_adminAuth) && $g_adminAuth->IsAuth(true)): ?>
        <head>
            <link rel="stylesheet" type="text/css" href="<?= Root('i/css/admin/menu.css') ?>" />
        </head>
       
        <div class="admin-menu">
            <div class="admin-menu-inner">
                <?php foreach($menu as $m): ?>
                    <a href="<?= SiteRoot($m["href"]) ?>" class="<?= GetQuery() == $m["href"] ? "active" : "" ?>"><?= $m["name"] ?></a>
                <?php endforeach; ?>
                <a class="push-right" href="<?= SiteRoot('admin/logout') ?>">Выход</a>
               
                <div class="clear"></div>
            </div>
        </div>
    <?php endif; ?>
