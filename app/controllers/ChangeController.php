<?php

class ChangeController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$model = new User();
    	$db = $this -> db;
		$this ->getDI()->get('db');
    	if($this->session->has('id')){
    		$id = $this->session->get('id');
    		$sql = "SELECT * FROM user WHERE id = '$id'";
    		$result = $db->query($sql);
			$row = $result->fetchArray();
			$hoten = $row['name'];
			$user = $row['account'];
			$this->view->setvar('hoten',$hoten);
			$this->view->setvar('user',$user);
		}
    }
    public function changeAction()
    {
    	$db = $this -> db;
		$this ->getDI()->get('db');
    	if($this->session->has('id')){
    		$id = $this->session->get('id');
    		$sql = "SELECT * FROM user WHERE id = '$id'";
    		$result = $db->query($sql);
			$row = $result->fetchArray();
	    	$opw  = $this->request->getPOST('old-password'); 
	    	$npw  = $this->request->getPOST('password'); 
	    	$cpw = $this->request->getPOST('confirm-password');
		    if($opw === $row['password']){
		    	if($npw === $cpw){
		    		$query = "UPDATE user SET password = '$npw' WHERE id ='$id'";
		    		$results = $db -> query($query);
		    		if($result){
		    			$this->flashSession->success("Cập nhật thành công!");
		    			$this ->response->redirect('change');
		    		}
			    }else{

			    }
		    }else{
		    	
		    }
    	}
    	$this->view->disable();
    }

}

