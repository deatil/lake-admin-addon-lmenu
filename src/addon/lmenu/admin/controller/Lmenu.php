<?php

namespace app\admin\controller;

use think\facade\View;

use lake\TTree;

use lake\module\controller\AdminBase;

use lake\admin\Model\AuthRule as AuthRuleModel;
use lake\admin\service\AuthRule as AuthRuleService;

use app\lmenu\lib\Menu;

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
        $result = (new AuthRuleService())->returnNodes(false);
        
        $json = [];
        if (!empty($result)) {
            foreach ($result as $rs) {
                $data = [
                    'id' => $rs['id'],
                    'parentid' => $rs['parentid'],
                    'title' => $rs['title'],
                    'spread' => false,
                ];
                $json[] = $data;
            }
        }
        
        $json = (new TTree)->withConfig('buildChildKey', 'children')->withData($json)->buildArray(0);
        
        View::assign('json', $json);
        
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
