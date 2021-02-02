<?php

return [
    // 模块ID[必填]
    'module' => 'lmenu',
    // 模块名称[必填]
    'name' => '菜单结构',
    // 模块简介[选填]
    'introduce' => '提取后台菜单分级结构格式',
    // 模块作者[选填]
    'author' => 'deatil',
    // 作者地址[选填]
    'authorsite' => 'http://github.com/deatil',
    // 作者邮箱[选填]
    'authoremail' => 'deatil@github.com',
    // 版本号，请不要带除数字外的其他字符[必填]
    'version' => '2.0.6',
    // 适配最低lake版本[必填]
    'adaptation' => '2.0.2',
    
    // 模块地址，插件自定义包时填写
    'path' => __DIR__,
    
    // 依赖模块
    'need_module' => [],
    
    // 设置
    'setting' => [],
    
    // 菜单
    'menus' => include __DIR__ . '/menu.php',
    
    // 事件
    'event' => [],
    
    // 演示数据文件
    'demo' => 0,
];
