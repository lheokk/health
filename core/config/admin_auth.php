<?php

    $g_config['admin_auth'] = array();

    $g_config['admin_auth']['admins'] = array
                                       (
                                           array(
                                                    'login'        => 'admin',
                                                    'pwd'          => 'admin'
                                                )
                                       );

    $g_config['admin_auth']['salt']   = 'asdfghj12345566';

    $g_config['admin_auth']['after_login_page'] = 'admin/default';

?>