<?php

    global $g_adminAuth;
    $g_adminAuth->Out();
    header("Location: " . SiteRoot('admin/login'));
    exit();
?>