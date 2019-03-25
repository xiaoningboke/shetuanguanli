<?php

namespace Admin\Controller;

use Think\Controller;

use Admin\Model\MajorModel;
use Admin\Model\DepartmentModel;
use Admin\Model\UserModel;


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

    /**
     * 用户列表查询
     * @return [type] [description]
     */
    public function user_list(){

        $map['username'] =array('like','%'.$_POST["username"].'%');
        $map['state'] =array('like','%'.$_POST["state"].'%');
        $user = new UserModel();

      //p是前台传值过来的参数，也就是页码
        if($_GET['p']==NULL){
            $p=1;
        }else{
            $p=$_GET['p'];
        }
        $data = $user->selUser($p,$map);
        $this->assign('data',$data);// 赋值数据集
        $count = $user->countUser($map);
        $Page = new \Think\Page($count,10);
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('count',$count);

        //查询系部
        $department = new DepartmentModel();
        $xi['state'] = array('not equal',1);
        $departmentData = $department->select($xi);
        $this->assign('departmentData',$departmentData);

        //查询专业
        $major = new MajorModel();
        $zy['state'] = array('not equal',1);
        $majorData = $major->select($zy);
        $this->assign('majorData',$majorData);

        $this->display();
    }

    /**
     * 修改用户的状态(AJAX)
     * @return [type] [description]
     */
    public function updateUserState(){
        $user = new UserModel();
        $f = $user->updateState($_POST);
        echo $f;
    }

    /**
     * 修改用户信息（AJAX）
     * @return [type] [description]
     */
    public function exitUser(){
        $user = new UserModel();
        $f = $user->updateState($_POST);
        echo $f;
    }

    /**
     * 删除用户(AJAX)
     * @return [type] [description]
     */
    public function delUser(){
        $user = new UserModel();
        $f = $user->delUserById($_POST["id"]);
        echo $f;
    }

    /**
     * 显示个人信息的页面
     * @return [type] [description]
     */
    public function admin_info(){
        $id = session('user')["id"];
        $where["id"] = array('eq',$id);
        $user = new UserModel();
        $data = $user->findUser($where);
        $this->assign('data',$data);

          //查询系部
        $department = new DepartmentModel();
        $xi['state'] = array('not equal',1);
        $departmentData = $department->select($xi);
        $this->assign('departmentData',$departmentData);

        //查询专业
        $major = new MajorModel();
        $zy['state'] = array('not equal',1);
        $majorData = $major->select($zy);
        $this->assign('majorData',$majorData);

        $this->display();
    }

    public function exitUserPassword(){
        $id = $_POST["id"];
        $password = $_POST["password"];
        $oldpassword = $_POST["oldpassword"];
        $user = new UserModel();
        $where['id'] = array('eq',$id);
        $userData = $user->findUser($where);
        var_dump( $userData);
    }

}