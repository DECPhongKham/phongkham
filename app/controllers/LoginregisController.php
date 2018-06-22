<?php

class LoginregisController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function loginregisAction()
    {
    	$this->view->disable();
		$model = new User();
		$user = $this -> request-> getPost('username');
		$pw = $this -> request-> getPost('password');
		if($user ===""){
				$this->flashSession->error("Không được để trống tên tài khoản!");
				return $this ->response->redirect('loginregis');
		}else{
			$user = trim($user," ");
			if($user ===""){
				$this->flashSession->error("Không được để trống tên tài khoản!");
				return $this ->response->redirect('loginregis');
			}else{
			 	if($pw ===""){
					$this->flashSession->error("Không được để trống mật khẩu");
					return $this ->response->redirect('loginregis');
				}else{
					$db = $this -> db;
			    	$this ->getDI()->get('db');
			    	$sql= "SELECT * FROM USER WHERE account = '$user'";
			    	$result = $db->query($sql);
			    	$row = $result->fetchArray();
			    	if($row){
			    		if($pw != $row['password']){
			    			$this->flashSession->error("Tài khoản không chính xác");
							return $this ->response->redirect('loginregis');
			    		}else{
			    			$role = $row['role'];
			    			$id = $row['id'];
			    			$this->session->set('role', $role);
			    			$this->session->set('id', $id);
				    		$this->response->redirect('dashboard/dashboard');
			    		}
			    	}else{
			    		$this->flashSession->error("Tài khoản không chính xác");
						return $this ->response->redirect('loginregis');
			    	}
				}
			}
	    } 
    }
    public function sessionAction()    
    {
    	
    }
    public function logoutAction()
    {
        $this->session->destroy();
        $this ->response->redirect();
    }
    public function returnAction()
    {
        $this ->response->redirect();
    }
}

