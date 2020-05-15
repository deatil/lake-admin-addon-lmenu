<?php

namespace app\admin\controller;

use think\facade\Db;
use think\facade\View;

use app\lmenu\lib\Menu;

use lake\module\controller\AdminBase;

use app\admin\Model\AuthRule as AuthRuleModel;

/**
 * 后台菜单增强
 * 
 * @create 2019-10-24
 * @author deatil
 */
class Lmenu extends AdminBase
{
    
    /**
     * 框架初始化
     *
     * @create 2019-10-27
     * @author deatil
     */
    protected function initialize()
    {
        // 设置当前模板路径
        $this->moduleViewPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR;
        
        parent::initialize();
    }

    /**
     * 菜单列表
     *
     * @create 2019-10-24
     * @author deatil
     */
    public function index()
    {
        $result = (new AuthRuleModel())->returnNodes(false);
        
        $json = [];
        if (!empty($result)) {
            foreach ($result as $rs) {
                $data = [
                    'nid' => $rs['id'],
                    'parentid' => $rs['parentid'],
                    'name' => $rs['title'],
                    'id' => $rs['id'],
                    'checked' => false,
                ];
                $json[] = $data;
            }
        }
        
        View::assign('json', json_encode($json));
        
        return View::fetch();
    }

    /**
     * 格式化菜单
     *
     * @create 2019-10-24
     * @author deatil
     */
    public function format()
    {
        if (!request()->isPost()) {
            return $this->error('请求错误');
        }

        $rules = request()->post('rules');
        
        $auth_rules = (new AuthRuleModel())
            ->where([
                ['id', 'in', $rules],
            ])
            ->order('listorder ASC,id ASC')
            ->select()
            ->toArray();
            
        $result = Menu::toMenu($auth_rules);

        return $this->success('请求成功', '', lake_var_export($result));
    }

}
