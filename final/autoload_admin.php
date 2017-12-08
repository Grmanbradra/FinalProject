<?php

require_once __DIR__ . '/config/session_admin.php';

require_once __DIR__ . '/config/connectdb.php';

require_once __DIR__ . '/helper/fn.php';

require_once __DIR__ . '/share/notifications.php';

require_once __DIR__ . '/common/menu.php';

require_once __DIR__ . '/process/WebAPI.php';



function base_file($path = '') {
    return dirname(__FILE__) . '/' . $path;
}