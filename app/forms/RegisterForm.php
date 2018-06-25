<?php 
namespace App\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Forms\Element\Radio;
class RegisterForm extends Form
{
    public function initialize($object = null)
    {
        if ($object){
            $this->add(new Hidden('id'));
            
        }
        $role = new Radio('role',[
            'class'=>'',
            'style' => '',
            'value' => '2',
        ]);
        $role->addValidator(
            new PresenceOf(['message'=>'Bạn chưa đồng ý với điều khoản của chúng tôi!'])
            );
        $this->add($role);
        
        $name = new Text('name',[
           'class'=>'form-control',
           'placeholder' => 'Họ Tên',
           'required' =>'true',
        ]);
        $name->addValidator(
            new PresenceOf(['message'=>'The account is required'])
            );
//         $name->addValidator(
//             new StringLength([
//                 'min' => 6,
//                 "messageMinimum"=>"Tên tài khoản phải từ 6 ký tự!"
//             ])
//             );
        $this->add($name);
        //Ngay sinh
        $ngaysinh = new Date('birthday',[
            'class'=>'form-control',
            'placeholder' => 'Ngày Sinh',
            'required' =>'true',
        ]);
        $this->add($ngaysinh);
        //Dia chi
        $address = new Text('address',[
            'class'=>'form-control',
            'placeholder' => 'Địa Chỉ',
            'required' =>'true',
        ]);
        $this->add($address);
        //Ten tai khoan
        $user = new Text('account',[
            'class'=>'form-control',
            'placeholder' => 'Tên Đăng Nhập',
            'required' =>'true',
        ]);
        $user->addValidator(
            new PresenceOf(['message'=>'The account is required'])
            );
        $user->addValidator(
            new StringLength([
                'min' => 6,
                "messageMinimum"=>"Tên tài khoản phải từ 6 ký tự!"
            ])
            );
        $this->add($user);
        
        //password
        $password = new Password('password',
            array(
                'placeholder'=>'Mật Khẩu',
                'class'=>'form-control',
                'required' =>'true',
            )
            );
        $password->addValidators(
            array(
                new PresenceOf(
                    array(
                        'message'=>'The password is required'
                    )
        
                    ),
                new StringLength(
                    array(
                        'min'=> 6,
                        "messageMinimum"=>"Mật khẩu quá ngắn, phải từ 6 ký tự!"
                    )
        
        
                    ),
                new Confirmation(
                    array(
                        'message'=>'Mật khẩu không khớp',
                        'with'  =>'password_confirm'
                    )
                    )
            )
            );
         
        $this->add($password);
        //password
        $password_confirm = new Password('password_confirm',
            array(
                'placeholder'=>'Xác Nhận Mật Khẩu',
                'class'=>'form-control',
                'required' =>'true',
            )
            );
        $password_confirm->addValidators(
            array(
                new PresenceOf([
                    'message'=>'The password is required'
                ])
            )
            );
        $this->add($password_confirm);
    }
}