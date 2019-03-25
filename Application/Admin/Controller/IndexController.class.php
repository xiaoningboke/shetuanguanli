<?php

namespace Admin\Controller;

use Admin\Model\MajorModel;
use Think\Controller;

use Admin\Model\DepartmentModel;


/**
 * 系统管理员控制器
 */
class IndexController extends Controller
{
    public function index()
    {
        $this->display();
    }

    /**
     * 显示系部列表
     * @return [type] [description]
     */
    public function department_list()
    {
        $department = new DepartmentModel();
        $data = $department->selDepartment($_POST);
        $count = $department->countDepartment($_POST);
        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->display();
    }

    /**
     * 添加系部数据(AJAX)
     * @return [type] [description]
     */
    public function adddepartment()
    {
        $data = $_POST;
        $department = new DepartmentModel();
        $f = $department->addDepartment($data);
        echo $f;
    }

    /**
     * 更新系部的状态（AJAX）
     * @return [type]     [description]
     */
    public function updateDepartmentState()
    {
        $department = new DepartmentModel();
        $f = $department->updateState($_POST);
        echo $f;
    }

    /**
     * 更新系部信息（AJAX）
     * @return [type] [description]
     */
    public function exitDepartment()
    {
        $department = new DepartmentModel();
        $f = $department->updateState($_POST);
        echo $f;
    }

    /**
     * 根据id删除系部（AJAX）
     * @return [type] [description]
     */
    public function delDepartment()
    {
        $department = new DepartmentModel();
        $f = $department->delDepartmentById($_POST["id"]);
        echo $f;
    }

    /**
     * 显示专业的列表
     */
    public function major_list()
    {
        $major = new MajorModel();
        $data = $major->selMajor();
        $count = $major->countMajor();
        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->display();
    }

    /**
     * 添加专业信息（AJAX）
     */
    public function addMajor()
    {
        $data = $_POST;
        $major = new MajorModel();
        $f = $major->addMajor($data);
        echo $f;
    }

    /**
     * 更新专业的状态
     * @return [type] [description]
     */
    public function updateMajorState(){
        $major = new MajorModel();
        $f = $major->updateState($_POST);
        echo $f;
    }

    /**
     * 更新用专业信息
     * @return [type] [description]
     */
    public function exitMajor(){
        $major = new MajorModel();
        $f = $major->updateState($_POST);
        echo $f;
    }

    /**
     * 对专业进行删除
     * @return [type] [description]
     */
    public function delMajor()
    {
        $major = new MajorModel();
        $f = $major->delMajorById($_POST["id"]);
        echo $f;
    }
}