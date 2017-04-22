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
use think\Request;

/**
 * 系统用户控制器
 * @author  ILSunshine
 */
class Shipping extends Common
{
    /**
     * 配送列表
     * @author 
     */
    public function index()
    {
        // 配送列表
        $shipList = Db::name('Shipping')
                    ->order('shipping_id desc')
                    ->paginate(8);
         // 把分页数据赋值给模板变量ordersList      
        $this->assign('shipList', $shipList);
        return $this->fetch();
    }
	
	/**
     * 添加配送
     * @author 
     */
	public function add(){
		
		if (Request::instance()->isPost()) {
			
			$shipping_name          = input('post.shipping_name');	// 配送名称
            $shipping_desc          = input('post.shipping_desc');	// 配送描述
            $shipping_order         = input('post.shipping_order');	// 配送排序
			
			$value['shipping_name']      = $shipping_name;
            $value['shipping_desc']      = $shipping_desc;
            $value['shipping_order']     = $shipping_order;
            
            //插入数据表
            $res = Db::name('Shipping')->insert($value);
            if($res) {
              return $this->success('添加成功',url('admin/shipping/index'));
            } else {
              return $this->error('添加失败');
            }
			
		}else{
			
			return $this->fetch('add');
			
		}
		
	}
	
	/**
     * 编辑配送
     * @author 
     */
	
	public function edit($id){
		
		if (Request::instance()->isPost()) {
			
			$shipping_id 			= input('post.id');
			$shipping_name          = input('post.shipping_name');	// 配送名称
            $shipping_desc          = input('post.shipping_desc');	// 配送描述
            $shipping_order         = input('post.shipping_order');	// 配送排序
			
			$value['shipping_name']      = $shipping_name;
            $value['shipping_desc']      = $shipping_desc;
            $value['shipping_order']     = $shipping_order;
			
            //插入数据表

			$getStatus     = Db::name('Shipping')->where('shipping_id',$shipping_id)->update($value);
			
            if($getStatus !== false){
                return $this->success('编辑成功',url('admin/shipping/index'));
            }else{
                return $this->error('编辑失败');
            }
			
		}else{
			
			// 查询单条数据
			if (empty($id)) {
			  return $this->error('请选择有效数据');
			}   
			$map['shipping_id']     = $id;          
			$shipInfo      			= Db::name('Shipping')->where($map)->find();    
			
			$this->assign('shipInfo',$shipInfo);
			
			return $this->fetch('edit');
			
		}
		
	}
	
    /**
     * 删除配送
     * @author 
     */
	
	public function delete(){
		
        $shipids = input('ids');
		// 清空Goods表
		$shipResult = Db::name('Shipping')->where('shipping_id',$shipids)->delete();
        
        if ($shipResult) {
			Db::name('Shipping_area')->where('shipping_id',$shipids)->delete();
            return $this->success('操作成功！');
        } else {
            return $this->error('操作失败！');
        }
	}
	
	/**
     * 设置区域
     * @author 
     */
	
	public function shipping_area($id){
		
		
		// 查询单条数据
		if (empty($id)) {
		  return $this->error('请选择有效数据');
		}
		
		$areaList = Db::name('Shipping_area')->where("shipping_id", $id)->order('shipping_area_id desc')->select();
		
		
		foreach($areaList as $key=>$val){
			$areaList[$key]['configure'] = unserialize($val['configure']);
		}

		$this->assign('id',$id);
		$this->assign('areaList',$areaList);
		return $this->fetch('shipping_area');
		
	}
	/**
     * 添加区域
     * @author 
     */
	public function area_add($id){

		if (Request::instance()->isPost()) {
			
			$shipping_area_name 		= input('post.shipping_area_name');
			$fee_compute_mode			= input("post.fee_compute_mode");
			$base_fee 					= input("post.base_fee");
			$step_fee  					= input("post.step_fee");
			$step_fee1 					= input("post.step_fee1");
			$free_money 				= input("post.free_money");
			$item_fee 					= input("post.item_fee");
			$shipping_id 				= input("post.id");
			$regions 					= implode(",", input("post.regions/a"));
			$regions_name 				= implode(",", input("post.regions_name/a"));
			
			if($fee_compute_mode == 'by_weight'){
				
				$temp_data['fee_compute_mode'] 	= $fee_compute_mode;
				$temp_data['base_fee'] 			= $base_fee;
				$temp_data['step_fee'] 			= $step_fee;
				$temp_data['step_fee1'] 		= $step_fee1;
				$temp_data['regions'] 			= $regions;
				$temp_data['regions_name'] 		= $regions_name;
				
			}else if($fee_compute_mode == 'by_number'){
				
				$temp_data['fee_compute_mode'] 	= $fee_compute_mode;
				$temp_data['item_fee'] 			= $item_fee;
				$temp_data['regions'] 			= $regions;
				$temp_data['regions_name'] 		= $regions_name;
			}
			
			
			$data['shipping_area_name'] = $shipping_area_name;
			$data['shipping_id'] 		= $shipping_id;
			
			$temp_data['free_money'] 	= $free_money;
			$data['configure'] 			= serialize($temp_data);
			
			//插入数据表
            $res = Db::name('Shipping_area')->insert($data);
            if($res) {
              return $this->success('添加成功',url('/shipping/shipping_area/id/'.$shipping_id));
            } else {
              return $this->error('添加失败');
            }
			
		}else{
			
			$this->assign('shipping_id',$id);
			
			return $this->fetch('area_add');
			
		}
		
	}
	
	/**
     * 编辑区域
     * @author 
     */
	public function area_edit($id){

		if (Request::instance()->isPost()) {
			
			$shipping_area_name 		= input('post.shipping_area_name');
			$fee_compute_mode			= input("post.fee_compute_mode");
			$base_fee 					= input("post.base_fee");
			$step_fee  					= input("post.step_fee");
			$step_fee1 					= input("post.step_fee1");
			$free_money 				= input("post.free_money");
			$item_fee 					= input("post.item_fee");
			$shipping_area_id 			= input("post.id");
			$regions 					= implode(",", input("post.regions/a"));
			$regions_name 				= implode(",", input("post.regions_name/a"));
			
			if($fee_compute_mode == 'by_weight'){
				
				$temp_data['fee_compute_mode'] 	= $fee_compute_mode;
				$temp_data['base_fee'] 			= $base_fee;
				$temp_data['step_fee'] 			= $step_fee;
				$temp_data['step_fee1'] 		= $step_fee1;
				$temp_data['free_money'] 		= $free_money;
				$temp_data['regions'] 			= $regions;
				$temp_data['regions_name'] 		= $regions_name;
				
			}else if($fee_compute_mode == 'by_number'){
				
				$temp_data['fee_compute_mode'] 	= $fee_compute_mode;
				$temp_data['item_fee'] 			= $item_fee;
				$temp_data['regions'] 			= $regions;
				$temp_data['regions_name'] 		= $regions_name;
			}
			
			
			$data['shipping_area_name'] = $shipping_area_name;
			$data['configure'] 			= serialize($temp_data);
			
			//插入数据表
			$getStatus     = Db::name('Shipping_area')->where('shipping_area_id',$shipping_area_id)->update($data);
            if($getStatus) {
				
				$shipping_area = Db::name('Shipping_area')->where('shipping_area_id',$shipping_area_id)->find();
				$shipping_id = $shipping_area['shipping_id'];
              	return $this->success('修改成功',url('/shipping/shipping_area/id/'.$shipping_id));
            } else {
              	return $this->error('修改失败');
            }
			
		}else{
			
			// 查询单条数据
			if (empty($id)) {
			  return $this->error('请选择有效数据');
			}   
			$map['shipping_area_id']    = $id;
			$areaInfo      				= Db::name('Shipping_area')->where($map)->find();    
			
			$areaInfo['configure'] 		= unserialize($areaInfo['configure']);
			
			
			$regions = explode(",", $areaInfo['configure']['regions']);
			
			$regions_name = explode(",", $areaInfo['configure']['regions_name']);
			
			$reg_arr = array();
			
			foreach($regions as $key=>$val){
				$reg_arr[$key]['regions_id'] 	= $val;
				$reg_arr[$key]['regions_name'] 	= $regions_name[$key];
			}

			$areaInfo['configure']['regions'] = $reg_arr;
			
			$this->assign('areaInfo',$areaInfo);
			
			return $this->fetch('area_edit');
			
		}
	}
	
	/**
   *设置会员状态
   * 1:正常
   * 2:禁用
   * -1:删除
   * @author 完美°ぜ界丶
   */
	public function setStatus()
	{
		$status    = input('post.status');
		$shippingids   = input('post.ids/a');
		if (!in_array($status,['-1'])) {
			return $this->error('请勾选需要操作的区域');
		}
		
		$shipResult = Db::name('Shipping_area')->where('shipping_area_id','in',implode(',',$shippingids))
			->delete();
		
		if ($shipResult) {
            return $this->success('操作成功！');
        } else {
            return $this->error('操作失败！');
        }
		
	}
}
