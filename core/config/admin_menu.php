<?php

    $g_config['admin_menu'] = empty($g_config['admin_menu']) ? array() : $g_config['admin_menu'];
 
    $g_config['admin_menu'] = array(
		
        array(
            'href' => 'admin/articles/index',
            'name' => 'Articles',
            'class' => 'icon-home',
            'section' => 'articles/',
            'submenu'=> array(
                            array(
                                    'href' => 'admin/articles/index',
                                    'name' => 'Articles',
                                    'class' => 'icon-time',
                                    'section' => 'index/articles'
                                ),
                            ),

        ),
        
        /*array(
            'href' => 'admin/gallery/index',
            'name' => 'Галерея',
			'class' => 'icon-picture',
			'section' => 'gallery',
			'submenu'=> array(
                            array(
                                    'href' => 'admin/gallery/index',
                                    'name' => 'Список альбомов',
                                    'class' => 'icon-list',
                                    'section' => 'gallery/index'
                                    ),
                            array(
                                    'href' => 'admin/gallery_100/index',
                                    'name' => 'Главная',
                                    'class' => 'icon-check-empty',
                                    'section' => 'gallery_100/index'
                                    )
                            ),
        ),*/
        
		array(
            'href' => 'admin/admin_users/index',
            'name' => 'Админы',
			'class' => 'icon-user',
			'section' => 'admin_users',
			'submenu'=> array(
								array(
									'href' => 'admin/admin_users/index',
									'name' => 'Список',
									'class' => 'icon-group',
									'section' => 'admin_users/index'
									),
								array(
									'href' => 'admin/admin_users/new_user',
									'name' => 'Создать',
									'class' => 'icon-pencil',
									'section' => 'admin_users/new_user'
									)
								)
        ),
		array(
            'href' => 'admin/logout',
            'name' => 'Выйти',
			'class' => 'icon-off',
			'section' => 'logout'
        )
    );

?>