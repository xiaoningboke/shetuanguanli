<?php
namespace Login\Model;

use Think\Model;
/**
 * 用户model类
 */
class UserModel extends Model {

	/**
	 * 根据用户名查找用户
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function findUserByUsername($username){
		$user = M("User");
		$where = array("username"=>$username);
		$data = $user->where($where)->find();
		return $data;
	}
}