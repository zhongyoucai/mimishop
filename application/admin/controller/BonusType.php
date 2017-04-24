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
  			$starttime = strtotime(input('post.starttime'));//开始时间
  			$endtime = strtotime(input('post.endtime'));//结束时间
  			$term = input('post.term');//优惠券有效期

  			$value['type_name'] = $couponname;
  			$value['send_type'] = $sendtype;
  			$value['min_amount'] = $minamount;
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
    //添加优惠券
    public function edit(){
      if(Request::instance()->isPost()){
        //接受POST数据
        $couponname = input('post.couponname');//优惠券名字
        $sendtype = input('post.sendtype');//优惠券类型
        $minamount = input('post.minamount');//最小订单金额
        $starttime = strtotime(input('post.starttime'));//开始时间
        $endtime = strtotime(input('post.endtime'));//结束时间
        $term = input('post.term');//优惠券有效期
        $id = input('post.id');

        $value['type_name'] = $couponname;
        $value['send_type'] = $sendtype;
        $value['min_amount'] = $minamount;
        $value['start_time'] = $starttime;
        $value['end_time'] = $endtime;
        $value['term'] = $term;

        $res = Db::name('bonus_type')->where('type_id',$id)->update($value);

        if($res) {
          return $this->success('编辑成功',url('admin/BonusType/index'));
        } else {
          return $this->error('编辑失败');
        }
      }else {

        $id = input("id");
        if(empty($id)){
          return $this->error('非法请求');
        }
        $bonus_info = DB::name("bonus_type")->where("type_id",$id)->find();

        $this->assign('bonus_info',$bonus_info);
        return $this->fetch();
      }
    } 
    /**
     * 发放优惠券
     * @author tangtanglove
     */
    public function send(){

      $id   = input("id");
      $type = input("type");

      //按照用户发放
      if($type == '0'){
        if(Request::instance()->isPost()){

          $bonusinfo = Db::name("bonus_type")->field('term')->where('type_id',$id)->find();

          $term = strtotime("+".$bonusinfo['term']." day");
          $usertype = input("post.usertype");
          $rankid   = input("post.rankid");

          if($usertype == 0){
            $userlist = Db::name("users")->where('rank_id',$rankid)->field('id')->select();
            foreach ($userlist as $key => $value) {
              # code...
              $data['bonus_type_id'] = $id;
              $data['user_id'] = $value['id'];
              $data['bonus_end_time'] = $term;
              $data['add_time'] = time();

              $res = Db::name("user_bonus")->insert($data);
              if(!$res){
                return $this->error('添加失败');
              }
            }

            if($res){
                return $this->success('添加成功',url('admin/BonusType/index'));
             }
          }else{

          }

        }else{

          $rank_list = Db::name("user_rank")->field('rank_id,rank_name')->select();
          $this->assign('rank_list', $rank_list);
          $this->assign('id', $id);
          return $this->fetch("userbonus");
        }
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
