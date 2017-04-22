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
use think\Lang;
use think\Db;
use think\Input;

class BonusType extends Validate
{
    protected $rule =   [      
        'couponname'       => 'require|checkHasValue:couponname',//优惠券名称
        //'sendtype'   => 'require',//优惠券类型
		'minamount'   => 'require|number',//最小订单金额
		'couponnumber'       => 'require|number',//优惠券数量
        'starttime'          => 'require|number',//开始时间
        'endtime'       => 'require|number',//结束时间
        'term'     => 'require|number',//优惠券期限
    ];

    protected $message  =   [

        'couponname.require '               => '优惠券名称不能为空',
        'couponname.checkHasValue:couponname' => '优惠券已存在',
		
        'couponnumber.require '               => '请填写优惠券数量',
        'couponnumber.number'               => '优惠券数量必须是数字', 
		
		'sendtype.require '               => '红包类型必填',
		
		'minamount.require '               => '请填写最小订单金额',
		'minamount.number '               => '订单金额必须为数字',
		
		'starttime.require '    => '开始时间不能为空',
		'endtime.require '    => '结束时间不能为空',
	   
        'term.require'     => '优惠券有效期不能为空',
		'term.number'     => '优惠券有效期为数字',
        
    ];
	//验证场景
    protected $scene = [
        'add'                  =>  ['couponname','couponnumber','sendtype','minamount','starttime','endtime','term']
    ];

    protected function checkHasValue($value,$rule)
      {      
        $id = input('id');
      
        switch ($rule) {
                     case 'couponname'   :
                        if (empty($id)) {
                            $hasValue = Db::name('BonusType')->where('type_name',$value)->find();
                            if (empty($hasValue)) {
                                return true;
                            } else {
                                return "优惠券已存在！";
                            }
                        } else {
                            //更改资料判断优惠券是否与其他的优惠券相同
                            $checkValue = Db::name('BonusType')
                                        ->where('id','neq',$id)
                                        ->where('type_name',$value)
                                        ->find();
                            if (empty($checkValue)) {
                                        return true;
                                    } else {
                                        return "优惠券已存在";
                                    }
                       }
                         break;
                     
                 }          
       
         
   
     }
}