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
    'authorsite' => 'github.com/deatil',
    // 作者邮箱[选填]
    'authoremail' => 'deatil@github.com',
    // 版本号，请不要带除数字外的其他字符[必填]
    'version' => '1.0.2',
    // 适配最低lake版本[必填]
    'adaptation' => '1.0.2',
    // 签名[必填]
    'sign' => '11ce918dc37f8b40e45ab91f40aec6e6',
    
    // 模块地址，插件自定义包时填写
    'path' => __DIR__,
    
    // 依赖模块
    'need_module' => [],
    
    // 设置
    'setting' => [],
    
    // 菜单
    'menus' => include __DIR__ . '/menu.php',
    
    // 嵌入点
    'hooks' => [],
    
    // 数据表，请加表前缀pre__[有数据库表时必填]
    'tables' => [],
    
    // 演示数据文件。比如：demo.sql，文件位于install根目录
    'demo' => '',
];
