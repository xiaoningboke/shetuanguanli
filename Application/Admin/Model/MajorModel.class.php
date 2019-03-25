<?php

namespace Admin\Model;

use Think\Model;

/**
 * 用户model类
 */
class MajorModel extends Model
{
    /**
     * 添加专业信息
     * @param [type] $data [description]
     */
    public function addMajor($data)
    {
        $major = M("Major");
        $i = $major->add($data);
        return $i;
    }

    /**
     * 查询所有系部信息
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function selMajor($data)
    {
        $major = M("Major");
        $data = $major->where($data)->select();
        return $data;
    }

    /**
     * 查询一共有多少条系部数据
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function countMajor($data)
    {
        $major = M("Major");
        $count = $major->where($data)->count();
        return $count;
    }

    /**
     * 更新系部的状态
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function updateState($data)
    {
        $major = M("Major");
        $where = array("Id" => $data[id]);
        $f = $major->where($where)->save($data);
        return $f;
    }

    /**
     * 根据id进行删除
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delMajorById($id)
    {
        $where = array('Id' => $id);
        $major = M("Major");
        $f = $major->where($where)->delete();
        return $f;
    }

}