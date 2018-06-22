<?php
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Column;
class DashboardController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

        
    }
    public function dashboardAction()
    {    	
        if (!$this->session->has('id')) {
          $this->response->redirect();
        }else{
    	      $this->view->setRenderLevel(View::LEVEL_LAYOUT);
        }
    }
    
    
}

