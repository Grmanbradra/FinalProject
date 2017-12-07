<?php

function url($uri = '') {
    $base_url_admin = $_SERVER['REQUEST_URI'];

    if(strpos($base_url_admin, '.php')) {
        $base_url_admin = substr($base_url_admin, 0, strrpos($base_url_admin, '/')) . '/';
    }
    return $base_url_admin . $uri;
}


function active_page($filename = '') {
    $file = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

    if ($file == 'admin' && $filename == 'index2.php') {
        return 'active';
    }

    return ($file == $filename)? 'active' : '';
}


function active_page_arr($filename = []) {
    $output = '';
    if(count($filename) > 0) {
        foreach ($filename as $val) {
            $output = active_page($val);
            if($output != '') {
                return $output;
            }
        }
    }
    return $output;
}