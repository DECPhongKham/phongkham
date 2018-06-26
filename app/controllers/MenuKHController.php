<?php
namespace App\Controllers;
use App\Controllers\ControllerBase;
use Phalcon\Mvc\View;
class MenuKHController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setRenderLevel(View::LEVEL_LAYOUT);
    }
}