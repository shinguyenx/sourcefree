<?php
class Application_Form_ValidationHistory extends Zend_Form
{
    public function __construct ($option = null)
    {
        parent::__construct($option);
        $this->setName('addhistory');
        
        $total = new Zend_Form_Element_Text('total');
        $total->addValidator('regex',false,'/^[0-9]{1,10}$/')->addErrorMessage('"Tổng Tiền" từ 0 đến 9 số');
        $total->setRequired();
        
        $quantity = new Zend_Form_Element_Text('quantity');
        $quantity->addValidator('regex',false,'/^([1-9]|[1-9][0-9]|100])$/')->addErrorMessage('Số lượng không nhỏ hơn 1 và vượt quá 100 cái');
        $quantity->setRequired();
        
        $status = new Zend_Form_Element_Text('status');
        $status->addValidator('regex',false,'/^[12]$/')->addErrorMessage('Không được bỏ trống');
        $status->setRequired();
        
        $nickname = new Zend_Form_Element_Text('nickname');
        $nickname->addValidator('regex',false,'/^.*$/')->addErrorMessage('"Tên gọi" không được bỏ trống');
        $nickname->setRequired();
        
        $username = new Zend_Form_Element_Text('username');
        $username->addValidator('regex',false,'/^.*$/')->addErrorMessage('"Tên đăng nhập" không được bỏ trống');
        $username->setRequired();
        
        $this->addElements(array($total,$quantity,$status,$nickname,$username));
    }
}

