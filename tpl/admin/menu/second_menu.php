<nav id="secondary" class="main-nav">

  <div class="profile-menu">

    <div class="pull-left">
      <div class="avatar">
        <img src="<?= Root('i/image/admin/avatar.png')?>" />
      </div>
    </div>

    <div class="pull-left">
      <div class="title">
        <?= $_SESSION['elite_admin_login']?>
      </div>
      <!--<div class="btn-group">
        <button class="button mini inset black"><i class="icon-search"></i></button>
        <button class="button mini inset black">Projects</button>
        <button class="button mini inset black dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
        <ul class="dropdown-menu black-box-dropdown">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>

      </div>-->
    </div>

    <div class="pull-right profile-menu-nav-collapse">
      <button class="button black"><i class="icon-reorder"></i></button>
    </div>

  </div>
  <ul class="secondary-nav-menu">
	<?php if(!empty($submenu)):?>
		<?php foreach($submenu as $k => $v):?>
			<li class="<?= strpos(GetQuery(), $v['section']) ? 'active' : ''?>" id="<?= isset($v['id']) ? $v['id'] : ''?>">
			  <a href="<?= SiteRoot($v['href'])?>">
				<i class="<?= $v['class']?>"></i> <?= $v['name']?>
			  </a>
			</li>
		<?php endforeach;?>
	<?php endif;?>
  </ul>

</nav>