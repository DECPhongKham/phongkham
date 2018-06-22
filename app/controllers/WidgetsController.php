<?php
use Phalcon\Mvc\View;
class WidgetsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function widgetsAction()
    {
    	$this->view->setRenderLevel(View::LEVEL_LAYOUT);
    }


}

