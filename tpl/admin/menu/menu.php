<?php

    global $g_adminAuth;
    $menu = $g_config['admin_menu'];
	$submenu = array();
?>
<?php if (is_object($g_adminAuth) && $g_adminAuth->IsAuth(true)): ?>
	<nav id="primary" class="main-nav">
	  <ul>
			<?php foreach($menu as $m): ?>
					<?php  (strpos(GetQuery(), $m['section']) || (strpos(GetQuery(), 'view/') && $m['section'] == 'index/')) ? $submenu = $m['submenu'] : ''?>
					<li class="<?= strpos(GetQuery(), $m['section']) || (strpos(GetQuery(), 'view/') && $m['section'] == 'index/') ? 'active' : ''?>">
					  <a href="<?= SiteRoot($m['href'])?>">
						<i class="<?= $m['class']?>"></i> <?= $m['name']?>
					  </a>
					</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<?php IncludeCom('admin/menu/second_menu', array('submenu'=> $submenu))?>
	<!--Breadcrumbs-->
	<?php IncludeCom('admin/breadcrumbs/breadcrumbs')?>
<?php endif; ?>
	<!--Разобраться с выпадающим меню
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-share-alt"></i>More <span class="caret"></span></a>

      <ul class="dropdown-menu">
        <li>
          <a href="../error_404.html">
              <i class="icon-warning-sign"></i> Error 404
          </a>
        </li>

        

        <li>
          <a href="../docs/docs.html">
              <i class="icon-book"></i> Documentation
          </a>
        </li>

        
        <li class="divider"></li>
        <li>
          <a href="../login/login.html">
              <i class="icon-off"></i> Log out (login page)
          </a>
        </li>
      </ul>
    </li>
	-->
  

<!--Second menu-->