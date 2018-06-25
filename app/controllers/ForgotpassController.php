<?php
namespace App\Controllers;
class ForgotpassController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function forgotpassAction()
    {
    	$model = new User();
		$user = $this -> request-> getPost('username');
		$pw = $this -> request-> getPost('password');
		$pwc = $this -> request-> getPost('confirmation');
		if($user ==="" || ($pw ==="") ||($pwc ==="")){
			$this->flashSession->error("Vui lòng điền đây đủ thông tin!");
				return $this ->response->redirect('forgotpass');
		}else{
			$db = $this -> db;
	    	$this ->getDI()->get('db');
	    	$sql= "SELECT * FROM USER WHERE account = '$user'";
	    	$result = $db->query($sql);
	    	$row = $result->fetchArray();
			if($row){
				if($pw === $pwc){
					$query = "UPDATE User SET password = '$pw' WHERE account = '$user'";
					$update = $db->query($query);
	 				if($update){
						$this->flashSession->success("Đặt lại mật khẩu thành công!");
						return $this ->response->redirect('forgotpass');
					}
				}else{
					$this->flashSession->error("Mật khẩu không trùng khớp!");
					return $this ->response->redirect('forgotpass');
				}
			}else{
				$message = '<h1 style="text-align: center;">Tài khoản không tồn tại</h1>';
 				$this->view->setvar('message',$message);
			}
		}
    }


}

