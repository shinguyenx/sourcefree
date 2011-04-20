<?php
class Application_Form_LoginForm extends Zend_Form 
{
    public function __construct ($option = null)
    {
        parent::__construct($option);
        $this->setName('loginForm');
        
        $username = new Zend_Form_Element_Text('username');
        
        $username->setLabel('Username :')->setRequired();        
        $username->addValidator('regex',false,'/^[A-z0-9]{6,12}$/')
                 ->addErrorMessage("Tên đăng nhập không được chứa ký tự đặt biệt và từ 6 đến 12 ký tự !");
        $username->setAttrib('class', 'field');
        
        
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password :')
                 ->setRequired();
        $password->setAttrib('class', 'field');
        
        $notEmpty = new Zend_Validate_NotEmpty();
        $notEmpty->setMessage('Mật khẩu bạn không được bỏ trống !');
        $password->addValidator($notEmpty);
        
        $this->addElements(array($username, $password));
    }
    
}

