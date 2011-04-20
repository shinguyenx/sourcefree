<?php

class Application_Form_Registercustomer extends Zend_Form
{
    public function __construct($option = NULL){
        parent::__construct($option);
        $this->setName('registercustomerForm');
        
        $username = new Zend_Form_Element_Text('username');
        $username->addValidator('regex',false,'/^[A-z0-9]{3,12}$/')
                 ->addErrorMessage("Tên đăng nhập không được chứa ký tự đặt biệt và từ 3 đến 12 ký tự !")
                 ->setRequired();
        
        $nickname = new Zend_Form_Element_Text('nickname');
        $nickname->addValidator('regex',false,'/^.{3,30}$/')
                 ->addErrorMessage('Tên gọi phải nhập từ 3 đến 30 ký tự !')
                 ->setRequired();
                 
        $notEmpty = new Zend_Validate_NotEmpty();
        $notEmpty->setMessage('Mật khẩu bạn không được bỏ trống !');
        
        $password = new Zend_Form_Element_Password('password');
        $password->setRequired();
        $password->addValidator($notEmpty);
        
        $comfirmpassword = new Zend_Form_Element_Password('comfirmpassword');
        $comfirmpassword->setRequired();
        $check = new Zend_Validate_Identical('password');
        $comfirmpassword->addValidator($check)->addErrorMessage('Mật khẩu nhập lại không chính xác !');
        
        $cellphone = new Zend_Form_Element_Text('cellphone');
        $cellphone->addValidator('regex',false,'/^[0-9]{9,11}$/')
                  ->addErrorMessage('Số điện thoại di động từ 9 đến 11 số !');        
                  
        $homephone = new Zend_Form_Element_Text('homephone');
        $homephone->addValidator('regex',false,'/^[0-9]{9,11}$/')
                  ->addErrorMessage('Số điện thoại di động từ 9 đến 11 số !');        
        
        $email = new Zend_Form_Element_Text('email');
        $email->addValidator('regex',false,'/^.{10,30}$/')
              ->addErrorMessage('Email phải theo định dạng example@gmail.com !');
                 
        $stringlegn = new Zend_Validate_StringLength();
        $stringlegn->setMin(10)->setMax(300);
        $stringlegn->setMessage('Địa chỉ phải nhập từ 10 đến 300 ký tự !');
        $address = new Zend_Form_Element_Textarea('address');
        $address->addValidator($stringlegn);
        
        $this->addElements(array($comfirmpassword,$username,$nickname,$password,$cellphone,$homephone,$address,$email));
    }
}

