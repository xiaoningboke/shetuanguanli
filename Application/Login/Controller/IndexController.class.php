<?php
namespace Login\Controller;

use Login\Model\UserModel;

use Think\Controller;
class IndexController extends Controller {
	  /**
     * 判断是否登录，登录就直接跳转到指定的栏目，没有登录就跳转到登录页面
     * @return [type] [description]
     */
    public function index(){
        if(!session('?user')){
            $this->display();
        }else{
            $this->judgeJump();
        }
    }
    /**
     * 显示验证码
     * @return [type] [description]
     */
    public function verify()
    {
        ob_end_clean();
        $config =    array(
        'fontSize'    =>  12,
        'length'      =>  4 ,
        'useNoise'    =>  false,
        'imageW'      =>  80,
        'imageH'      =>  38,
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    /**
     * 处理登录请求，并验证验证码
     * @return [type] [description]
     */
    public function login(){
        $identity = $_POST['identity'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $code = $_POST['code'];
        if(!$this->check_verify($code))
        {
            $this->error("验证码错误",U('Login/Index/index')) ;
        }else
        {
            $f = $this->findUser($username,$password);
            if($f){
            	$this->judgeJump();
            }else{
                $this->error('账号或密码错误',U('Login/Index/index'));
            }
        }
    }
    
    /**
     * 判断用户是否存在，存在就写入session
     * @param  [type] $username   [description]
     * @param  [type] $password [description]
     * @return [type]           [description]
     */
    public function findUser($username,$password){
        $user = new UserModel();
        $userData = $user->findUserByUsername($username);
        if(md5(md5($password))==$userData["password"]){
            session('user',$userData);
            return true;
        }else{
            return false;
        }
    }
    /**
     * 根据session里面的身份进行跳转
     * @return [type] [description]
     */
    public function judgeJump(){
        if(session('user')["identity"]==0){
             $this->redirect('Admin/Index/index');
        }else if(session('user')["identity"]==1){
             $this->redirect('Teacher/Index/index');
         }else if (session('user')["identity"]==2) {
             $this->redirect('Student/Index/index');
         }else if (session('user')["identity"]==3) {
             $this->redirect('Admin/Index/index');
         }else{
            return false;
         }
    }

    /**
     * 退出登录
     * @return [type] [description]
     */
    public function quit(){
        session('[destroy]');
        $this->redirect('Login/Index/index');
    }

   	/**
   	 * 检查用户输入的验证码是否正确
   	 * @param  [type] $code [description]
   	 * @param  string $id   [description]
   	 * @return [type]       [description]
   	 */
	function check_verify($code, $id = ''){
	    $verify = new \Think\Verify();
	    return $verify->check($code, $id);
	}
}
