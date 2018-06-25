<?php
namespace App\Controllers;
class LogoutController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function logoutAction()
    {
    	$this->session->destroy();
    	$this->response->rederict('giaodien');
    }
}

