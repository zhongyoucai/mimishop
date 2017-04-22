<?php
// +----------------------------------------------------------------------
// | Shopbb [ Easy to handle for Micro businesses ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.vip026.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: tangtanglove <dai_hang_love@126.com> <http://www.ixiaoquan.com>
// +----------------------------------------------------------------------

namespace app\wx\controller;

use think\Controller;
use think\Request;
use common\library\Mini;

/**
 * 系统通用控制器：需登录
 * @author  tangtnglove <dai_hang_love@126.com>
 */
class Common extends Mini
{
    var $users = '';
    /**
     * 初始化方法
     * @author tangtanglove
     */
    protected function _initialize()
    {
        if (session('wx_user_auth')) {
            define('UID', session('wx_user_auth.uid'));
        } else {
            define('UID', null);
        }
        if(!(UID)){
            $this->redirect(url('base/login'));
        }
     
        // 用户登陆id
        $this->users = session('wx_user_auth');
        
        $this->assign('userinfo',session('wx_user_auth'));
        // 不存在index.php，则定义
        $request = Request::instance();
        if (!substr_count($request->url(),'wx.php')) {
            //设置请求信息，解决某些环境下面url()方法获取不到index.php
            $request->root('wx.php');
        }
        // 储存网站配置
        config(select_key_value('config.base'));
        load_config();// 加载接口配置      
    }

    /**
     * 退出处理
     */
    public function logout()
    {
        //退出登錄註銷session
        session('wx_user_auth',null);
        //$this->redirect(url('index/index'));
    }

}
