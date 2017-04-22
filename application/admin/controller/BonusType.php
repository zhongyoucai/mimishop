<?php
// +----------------------------------------------------------------------
// | Shopbb [ Easy to handle for Micro businesses]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.vip026.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: tangtanglove <dai_hang_love@126.com> <http://www.ixiaoquan.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Loader;
use think\Request;

/**
 * 系统用户控制器
 * @author  完美°ぜ界丶
 */
class BonusType extends Common
{
    /**
     * 修改个人资料
     * @author 完美°ぜ界丶
     */
	public function index()
    {
        // 优惠券列表
        $couponList = Db::name('BonusType')
                    ->order('start_time desc')
                    ->paginate(8);
         // 把分页数据赋值给模板变量ordersList      
        $this->assign('couponList', $couponList);
        return $this->fetch();
    }
    //添加优惠券
	public function add(){
		if(Request::instance()->isPost()){
			//接受POST数据
			$couponname = input('post.couponname');//优惠券名字
			$sendtype = input('post.sendtype');//优惠券类型
			$minamount = input('post.minamount');//最小订单金额
			$couponnumber = input('post.couponnumber');//数量
			$starttime = strtotime(input('post.starttime'));//开始时间
			$endtime = strtotime(input('post.endtime'));//结束时间
			$term = input('post.term');//优惠券有效期
			// 实例化验证器
            $validate = Loader::validate('BonusType'); 
			// 验证数据
            $data     = ['couponname'=>$couponname,'minamount'=>$minamount,'couponnumber'=>$couponnumber,'starttime'=>$starttime,'endtime'=>$endtime,'term'=>$term];
			// 验证
            if (!$validate->scene('addBonusType')->check($data)) {
                return $this->error($validate->getError());
             } 
			$value['type_name'] = $couponname;
			$value['send_type'] = $sendtype;
			$value['min_amount'] = $minamount;
			$value['number'] = $couponnumber;
			$value['start_time'] = $starttime;
			$value['end_time'] = $endtime;
			$value['term'] = $term;
			//$value['status']        = '1';
			//插入数据表
            $res = Db::name('BonusType')->insert($value);
			if($res) {
              return $this->success('添加成功',url('admin/BonusType/index'));
            } else {
              return $this->error('添加失败');
            }
		}else {
            return $this->fetch();
        }
	} 
	/**
     * 设置文章状态
     * @author tangtanglove
     */
    public function setstatus()
    {
        $status  = input('status');
        $goodsids = input('ids/a');
        if ($status == 'delete') {
            // 清空Goods表
            $goodsResult = Db::name('BonusType')->where('coupon_id','in',implode(',', $goodsids))->delete();
        } else {
            $goodsResult = Db::name('BonusType')->where('id','coupon_id',implode(',', $goodsids))->update(['status' => $status]);
        }

        if ($goodsResult) {
            return $this->success('操作成功！');
        } else {
            return $this->error('操作失败！');
        }
    }
	
	/**
     * 设置文章状态
     * @author tangtanglove
     */
    public function categorySetstatus()
    {

        $status  = input('post.status');
        $categoryids = input('post.ids/a');
		
		if ($status == 0) {
			return $this->error('请勾选需要操作的区域');
		}
        if ($status == 3) {
            // 清空Goods表
            $categoryResult = Db::name('BonusType')->where('id','in',implode(',', $categoryids))->delete();
        } else {
            $categoryResult = Db::name('BonusType')->where('id','in',implode(',', $categoryids))->update(['status' => $status]);
        }

        if ($categoryResult) {
            return $this->success('操作成功！');
        } else {
            return $this->error('操作失败！');
        }
    }
}
