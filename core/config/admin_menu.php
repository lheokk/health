<?php

    $g_config['admin_menu'] = empty($g_config['admin_menu']) ? array() : $g_config['admin_menu'];
 
    $g_config['admin_menu'] = array(
        array(
            'href' => 'admin/articles/index',
            'name' => 'Страницы',
            'class' => 'icon-home',
            'section' => 'articles/',
            'submenu'=> array(
                            array(
                                    'href' => 'admin/articles/index',
                                    'name' => 'Список',
                                    'class' => 'icon-time',
                                    'section' => 'articles/index'
                                ),
                            array(
                                    'href' => 'admin/articles/edit',
                                    'name' => 'Созать',
                                    'class' => 'icon-time',
                                    'section' => 'articles/edit'
                                ),
                            ),

        ),
        array(
            'href' => 'admin/index/index',
            'name' => 'Главная',
            'class' => 'icon-home',
            'section' => 'index/',
            'submenu'=> array(
                            array(
                                    'href' => 'admin/index/banner',
                                    'name' => 'Баннер',
                                    'class' => 'icon-time',
                                    'section' => 'articles/edit'
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