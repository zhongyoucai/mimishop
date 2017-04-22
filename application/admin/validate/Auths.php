<?php
// +----------------------------------------------------------------------
// | Shopbb [ Easy to handle for Micro businesses]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.vip026.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: tangtanglove <dai_hang_love@126.com> <http://www.ixiaoquan.com>
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Validate;
use think\Db;
class Auths extends Validate
{
    // 验证规则
    protected $rule =   [
        'group_name'  => 'require|checkName:name',
    ];

    // 错误提示消息
    protected $message  =   [
        'group_name.require'  => '用户组不能为空',
    ];

    // 自定义验证规则
    protected function checkName($value)
    {
        $info = Db::name('UserGroup')->where('title',$value)->find();
        if($info){
            return '用户组不能重复';
        }else{
            return true;
        }
    }
}