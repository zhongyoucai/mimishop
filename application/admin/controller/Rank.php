<?php
// +----------------------------------------------------------------------
// | Shopbb [ Easy to handle for Micro businesses]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.vip026.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 完美°ぜ界丶 
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Input;
use think\Loader;
use think\Request;

/**
 * 系统用户控制器
 * @author  完美°ぜ界丶 
 */
class Rank extends Common
{        
  public function index()
  {
      //会员列表  
      $rankList = Db::name('user_rank')
      ->order("rank_id desc")
      ->distinct(true)
      ->paginate(10);
      $this->assign('rankList',$rankList);
      return $this->fetch('index');
  }

  /**
   * @author mark
   * 添加会员等级
   */
  public function add()
    {
        if (Request::instance()->isPost()) {
            // 接收post数据
            $rank_name         = input('post.rank_name');// 用户名
            $min_points        = input('post.min_points');// 昵称
            $max_points        = input('post.max_points');// 邮箱
            $discount          = input('post.discount');//手机号
       
            $value['rank_name']     = $rank_name;
            $value['min_points']    = $min_points;
            $value['max_points']    = $max_points;
            $value['discount']      = $discount;
            
            //插入数据表
            $res = Db::name('user_rank')->insert($value);
            if($res) {
              return $this->success('添加成功',url('admin/rank/index'));
            } else {
              return $this->error('添加失败');
            }
        } else {
            return $this->fetch('add');
        }
    }  

  /**
   ** @author mark
   *  编辑会员等级
   */
    public function edit()
    {
       if (Request::instance()->isPost()) {
            $data          = input('post.');           

            $getStatus     = Db::name('user_rank')->where('rank_id',$data['rank_id'])->update($data);
            if($getStatus !== false){
                return $this->success('编辑成功',url('admin/rank/index'));
            } else {
                  return $this->error('编辑失败');
              }
      } else {
          $id = input('id');
          // 查询单条数据
          if (empty($id)) {
              return $this->error('请选择有效数据');
          }   
          $map['rank_id']     = $id;          
          $user_rank      = Db::name('user_rank')->where($map)->find();              
          $this->assign('user_rank',$user_rank);
          return $this->fetch('edit');
      }
    }

  /**
   *设置会员状态
   * 1:正常
   * 2:禁用
   * -1:删除
   * @author mark
   */
  public function setStatus()
  {
    $status    = input('post.status');
    $rankids   = input('post.ids/a');

    if (!in_array($status,['1','2','-1'])) {
      return $this->error('请勾选需要操作的选项');
    }
  

    $res = Db::name('user_rank')->where('rank_id','in',implode(',',$rankids))->delete();
    if($res){
      return $this->success('删除成功！');
    } else {
      return $this->error('删除失败！');
    }
  }

}