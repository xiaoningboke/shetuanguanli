<?php
namespace Admin\Model;

use Think\Model;
/**
 * 用户model类
 */
class DepartmentModel extends Model {
	/**
	 * 添加系部信息
	 * @param [type] $data [description]
	 */
	public function addDepartment($data){
		$department = M("Department");
		$i = $department->add($data);
		return $i;
	}

	/**
	 * 查询所有系部信息
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function selDepartment($data){
		$department = M("Department");
		$data = $department->where($data)->select();
		return $data;
	}

	/**
	 * 查询一共有多少条系部数据
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function countDepartment($data){
		$department = M("Department");
		$count = $department->where($data)->count();
		return $count;
	}

	/**
	 * 更新系部的状态
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function updateState($data){
		$department = M("Department");
		$where = array("Id" => $data[id]);
		$f = $department->where($where)->save($data);
		return $f;
	}

}