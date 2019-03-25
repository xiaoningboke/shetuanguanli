<?php

namespace Admin\Model;

use Think\Model;

/**
 * 用户model类
 */
class UserModel extends Model{

	/**
	 * 查询所有的用户信息
	 * @return [type] [description]
	 */
	public function selUser($p,$map){
		$user = M("User");
		$data = $user->where($map)->order('id')->page($p.',10')->select();
		return $data;
	}

	/**
	 * 统计用户数量
	 * @return [type] [description]
	 */
	public function countUser($map){
		$user = M("User");
		$count = $user->where($map)->count();
		return $count;
	}
	/**
	 * 更新用户信息
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	 public function updateState($data)
    {
        $user = M("User");
        $where = array("Id" => $data[id]);
        $f = $user->where($where)->save($data);
        return $f;
    }

    /**
     * 删除用户信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delUserById($id){
    	$where = array('Id' => $id);
        $user = M("User");
        $f = $user->where($where)->delete();
        return $f;
    }

    /**
     * 查找用户
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function findUser($where){
    	$user = M("User");
        $data = $user->where($where)->find();
        return $data;
    }
}