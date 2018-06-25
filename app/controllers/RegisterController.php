<?php
namespace App\Controllers;
use App\Forms\RegisterForm;
use App\Models\User;
class RegisterController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
       
    }
   public function registerAction()
    {
        $this->view->form = new RegisterForm();
    }
    public function register1Action()
    {
        $form = new RegisterForm();
        $user = new User();
        $form->bind($_POST, $user);
        if (!$form->isValid()){
            foreach ($form->getMessages()as $m){
                $this->flashSession->error($m->getMessage());
                $this->dispatcher->forward([
                    'controller'=> $this->router->getControllerName(),
                    'action'=>'register',
                ]);
                return ;
            }
                   
        }
//        $user->setPassword($this->security->hash($_POST['password']));
       if(!$user->save()){
           foreach ($user->getMessages()as $m){
               $this->flashSession->error($m->getMessage());
               $this->dispatcher->forward([
                   'controller'=> $this->router->getControllerName(),
                   'action'=>'register',
               ]);
               return ;
           }
       }
       $this->flashSession->success('Đăng ký thành công!');
       return $this->response->redirect('loginregis');
    }
}
