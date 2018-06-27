<?php
namespace App\Controllers;
use Phalcon\Mvc\View;
class DangKyThongTinController extends ControllerBase
{
    public function indexAction() {
        $this->view->setRenderLevel(View::LEVEL_LAYOUT);
    }
}