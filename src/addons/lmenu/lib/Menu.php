<?php

namespace app\lmenu\lib;

/**
 * 后台菜单增强工具
 * 
 * @create 2019-10-24
 * @author deatil
 */
class Menu
{
    /**
     * 生成菜单
     *
     * @create 2019-10-26
     * @author deatil
     */
    public static function toMenu($lists = [], $pid = 0) 
    {
        if (empty($lists)) {
            return [];
        }
        
        $pid = (string) $pid;
        
        $trees = [];
        $lists = array_values($lists);
        foreach ($lists as $key => $value) {
            if ($value['parentid'] == $pid) {
                $menu = [];
                if (!empty($value['name'])) {
                    $menu['route'] = $value['name'];
                }
                $menu['type'] = $value['type'];
                $menu['is_menu'] = $value['is_menu'];
                $menu['title'] = $value['title'];
                if (!empty($value['icon'])) {
                    $menu['icon'] = $value['icon'];
                }
                if (!empty($value['tip'])) {
                    $menu['tip'] = $value['tip'];
                }
                $menu['listorder'] = $value['listorder'];
                
                $child = self::toMenu($lists, $value['id']);
                if (!empty($child)) {
                    $menu['child'] = $child;
                }
                
                $trees[] = $menu;
            }
        }
        return $trees;
    }    
}