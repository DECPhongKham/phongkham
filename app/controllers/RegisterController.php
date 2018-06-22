<?php

class RegisterController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
   public function registerAction()
    {
	 	$model = new User();
	 	$name = $this -> request-> getPost('name');
	 	$date = $this -> request-> getPost('date');
	 	$address = $this -> request-> getPost('address');
	 	$user = $this -> request-> getPost('username');
	 	$pw = $this -> request-> getPost('password');
	 	$cpw = $this -> request-> getPost('confirm-password');
	 	if($user ===""){
 				$this->flashSession->error("Không được để trống tên tài khoản!");
				return $this ->response->redirect('register');
	 	}else{
 			$user2 = trim($user," ");
 			if($user2 ===""){
 				$this->flashSession->error("Tên tài không được là dấu cách!");
				return $this ->response->redirect('register');
 			}else{
			 	if($pw ===""){
 				$this->flashSession->error("Không được để trống tên mật khẩu!");
				return $this ->response->redirect('register');
				}else{
	 				$users = User::findFirst("account ='$user'");
		 			if($users === false){
		 				// Xét vai trò để phân loại tài khoản
		 				//====================================
		 				if ($this->session->has('role')) {
		 					$role = $this->session->get('role');
		 					if($role === 0){
		 						if($pw === $cpw){
					 				$array = array(
					 					'role'		=> '1',
					 					'name'		=> $name,
					 					'birthday'	=> $date,
					 					'address'	=> $address,
					 					'account'	=> $user,
						 				'password'	=> $pw
						 				);
					 				$model -> assign($array);
					 				if($model -> save()){
					 					$this->flashSession->success("Đăng ký thành công!");
										return $this->response->redirect('loginregis');
									}else{
										$this->flashSession->error("Đăng ký thất bại!");
										return $this ->response->redirect('register');
									}
			 					}
			 				}
			 			}else{
		 				//====================================
			 				if($pw === $cpw){
				 				$array = array(
				 					'role'		=> '2',
				 					'name'		=> $name,
				 					'birthday'	=> $date,
				 					'address'	=> $address,
				 					'account'	=> $user,
					 				'password'	=> $pw
					 				);
				 				$model -> assign($array);
				 				if($model -> save()){
				 					$this->flashSession->success("Đăng ký thành công!");
									return $this->response->redirect('loginregis');
								}else{
									$this->flashSession->error("Đăng ký thất bại!");
									return $this ->response->redirect('register');
								}
							}else{
								$this->flashSession->error("Mật khẩu xác nhận không chính xác!");
								return $this ->response->redirect('register');
							}
						}
		 			}else{
		 				$this->flashSession->error("Tên đăng nhập đã tồn tại!");
						return $this ->response->redirect('register');		
			 			}
		 			
	 			}
	 		}	
	    }
	}
}
