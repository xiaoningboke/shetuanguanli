<?php
namespace Admin\Controller;
use Think\Controller;

use Admin\Model\DepartmentModel;


/**
 * 系统管理员控制器
 */
class IndexController extends Controller {
    public function index(){
    	$this->display();
    }

    /**
     * 显示系部列表
     * @return [type] [description]
     */
    public function department_list(){
    	$department = new DepartmentModel();
    	$data = $department->selDepartment($_POST);
    	$count = $department->countDepartment($_POST);
    	$this->assign('data',$data);
    	$this->assign('count',$count);
    	$this->display();
    }

    /**
     * 添加系部数据(AJAX)
     * @return [type] [description]
     */
    public function adddepartment(){
    	$data = $_POST;
    	$department = new DepartmentModel();
    	$f = $department->addDepartment($data);
    	echo $f;
    }

    /**
     * 更新系部的状态（AJAX）
     * @return [type]     [description]
     */
    public function updateDepartmentState(){
    	$department = new DepartmentModel();
    	$f = $department->updateState($_POST);
    	echo $f;
    }
}