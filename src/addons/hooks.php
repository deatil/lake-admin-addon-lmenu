<?php

/**
 * lake-menu 添加模块配置信息
 *
 * @create 2019-10-26
 * @author deatil
 */

// 添加模块配置信息
app()->hook->add('lake_admin_modules', function () {    
    $info_file = rtrim(__DIR__, DIRECTORY_SEPARATOR) 
        . DIRECTORY_SEPARATOR . 'lmenu'
        . DIRECTORY_SEPARATOR . 'info.php';
    if (file_exists($info_file)) {
        $info = include $info_file;
    } else {
        $info = [];
    }
    
    return $info;
});

