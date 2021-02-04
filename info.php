<?php

return [
    'module' => 'lmenu',
    'name' => '菜单结构',
    'introduce' => '提取后台菜单分级结构格式',
    'author' => 'deatil',
    'authorsite' => 'http://github.com/deatil',
    'authoremail' => 'deatil@github.com',
    'version' => '2.0.7',
    'adaptation' => '2.3.27',
    
    'path' => __DIR__,
    'need_module' => [],
    'setting' => [],
    'menus' => include __DIR__ . '/menu.php',
    'event' => [],
    'demo' => 0,
];
