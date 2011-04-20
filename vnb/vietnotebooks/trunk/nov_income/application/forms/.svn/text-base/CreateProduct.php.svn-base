<?php

class Application_Form_CreateProduct extends Zend_Form
{

	public function __construct($option = NULL){
		parent::__construct($option);
        $this->setName('createProductForm');
        
        $name = new Zend_Form_Element_Text('name');
        $name->addValidator('regex',false,'/^.{1,50}$/')->addErrorMessage('" Tên sản phẩm " không được bỏ trống  !');
        $name->setRequired();
        
        $price = new Zend_Form_Element_Text('price');
        $price->addValidator('regex',false,'/^[0-9]{3,7}$/')->addErrorMessage('" Giá tiền" phải là số từ 0 đến 9 . Lớn nhất 9999999  !');
        $price->setRequired();
        
        $description = new Zend_Form_Element_Textarea('description');
        
        
        $this->addElements(array($name,$price,$description));
	}
}

