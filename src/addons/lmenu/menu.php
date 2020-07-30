<?php
return [
    [
        "route" => "admin/lmenu/index",
        "type" => 1,
        "is_menu" => 1,
        "title" => "菜单结构",
        "icon" => "icon-other",
        "tip" => "",
        "listorder" => 120,
        "child" => [
            [
                "route" => "admin/lmenu/index",
                "type" => 1,
                "is_menu" => 1,
                "title" => "菜单列表",
                "icon" => "icon-neirongguanli",
                "child" => [
                    [
                        "route" => "admin/lmenu/format",
                        "type" => 1,
                        "is_menu" => 0,
                        "title" => "格式化菜单",
                    ],
                ],
            ],

        ],
    ],
];
