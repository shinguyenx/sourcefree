<?php
class AdministratorController extends Zend_Controller_Action
{
    public function init ()
    {
        /* Initialize action controller here */
    }
    public function indexAction ()
    {}
    public function revenueAction ()
    {
        $this->view->Title = 'Tổng Kết';
         // action body
    }
    public function customerAction ()
    {
        $this->view->Title = 'Khách Hàng';
        $listUser = (new Application_Model_User());
        $this->view->listUser = $listUser->fetchRows();
    }
    public function productAction ()
    {
        $this->view->Title = 'Sản Phẩm';
        $listProduct = new Application_Model_Product();
        $this->view->listProduct = $listProduct->fetchRows();
    }
    public function registercustomerAction ()
    {
        $this->view->Title = 'Tạo Khách Hàng';
        $request = $this->getRequest();
        $ZForm = new Application_Form_Registercustomer();
        if ($this->getRequest()->isPost()) {
            if ($ZForm->isValid($this->_request->getPost())) {
                $modelUserInfo = new Application_Model_UserInformation();
                $modelUserInfo->zin_user_address = $request->getParam('address');
                $modelUserInfo->zin_user_email = $request->getParam('email');
                $modelUserInfo->zin_user_cellphone = $request->getParam(
                'cellphone');
                $modelUserInfo->zin_user_homephone = $request->getParam(
                'homephone');
                $modelUser = new Application_Model_User();
                $modelUser->zin_user_username = $request->getParam('username');
                $modelUser->zin_user_nickname = $request->getParam('nickname');
                $modelUser->zin_user_password = $request->getParam('password');
                $modelUser->zin_user_level = 0;
                $modelUser->zin_user_description = $modelUserInfo->serialize();
                $modelUser->save();
                $this->_redirect('/administrator/registerfinish');
            }
        }
        $error = $ZForm->getMessages();
        $this->view->username = $request->getParam('username');
        $this->view->nickname = $request->getParam('nickname');
        $this->view->password = $request->getParam('password');
        $this->view->comfirmpassword = $request->getParam('comfirmpassword');
        $this->view->cellphone = $request->getParam('cellphone');
        $this->view->homephone = $request->getParam('homephone');
        $this->view->email = $request->getParam('email');
        $this->view->address = $request->getParam('address');
        $this->view->errorUsername = isset($error['username']) ? Zincome_Static::getMessages(
        $error['username']) : '';
        $this->view->errorNickname = isset($error['nickname']) ? Zincome_Static::getMessages(
        $error['nickname']) : '';
        $this->view->errorPassword = isset($error['password']) ? Zincome_Static::getMessages(
        $error['password']) : '';
        $this->view->errorComfirmpassword = isset($error['comfirmpassword']) ? Zincome_Static::getMessages(
        $error['comfirmpassword']) : '';
        $this->view->errorCellphone = isset($error['cellphone']) ? Zincome_Static::getMessages(
        $error['cellphone']) : '';
        $this->view->errorHomephone = isset($error['homephone']) ? Zincome_Static::getMessages(
        $error['homephone']) : '';
        $this->view->errorEmail = isset($error['email']) ? Zincome_Static::getMessages(
        $error['email']) : '';
        $this->view->errorAddress = isset($error['address']) ? Zincome_Static::getMessages(
        $error['address']) : '';
    }
    public function registerfinishAction ()
    {
        $this->view->Title = 'Tạo Khách Hàng Thành Công';
         // action body
    }
    public function createproductAction ()
    {
        $request = $this->getRequest();
        $ZForm = new Application_Form_CreateProduct();
        if ($this->getRequest()->isPost()) {
            if ($ZForm->isValid($this->_request->getPost())) {
                $product = new Application_Model_Product();
                $product->zin_product_name = $request->getParam('name');
                $product->zin_product_price = $request->getParam('price');
                $product->zin_product_description = $request->getParam(
                'description');
                $date = new Zend_Date();
                $product->zin_product_time_updated = $date->get(
                'yyyy-MM-dd HH:mm:ss');
                $product->save();
            }
        }
        $error = $ZForm->getMessages();
        $this->view->name = $request->getParam('name');
        $this->view->price = $request->getParam('price');
        $this->view->description = $request->getParam('description');
        $this->view->errorName = isset($error['name']) ? Zincome_Static::getMessages(
        $error['name']) : '';
        $this->view->errorPrice = isset($error['price']) ? Zincome_Static::getMessages(
        $error['price']) : '';
        $this->view->errorDescription = isset($error['description']) ? Zincome_Static::getMessages(
        $error['description']) : '';
    }
    public function createproductfinishAction ()
    {
        // action body
    }
    public function addhistoryAction ()
    {
        if ($this->getRequest()->getParam('id') == '') {
            $this->_redirect('/administrator/customer');
        }
        $this->view->id = $this->getRequest()->getParam('id');
        $product = new Application_Model_Product();
        $product = $product->fetchRows();
        $arrProduct = array();
        $request = $this->_request->getPost();
        $choose = 0;
        foreach ($product as $value) {
            $arrProduct[$value->zin_product_id] = $value->zin_product_name;
        }
        if ($this->_request->isPost()) {
            $valid = new Application_Form_ValidationHistory();
            if ($valid->isValid($this->_request->getPost())) {
                $product = new Application_Model_Product();
                $product->zin_product_id = $request['product'];
                $choose = $product->fetchRow();
                
                $history = new Application_Model_History();
                $date = new Zend_Date();
                $history->zin_product_ref = $request['product'];
                $history->zin_user_ref = $request['id'];
                $history->zin_history_total = $choose->zin_product_price * $request['quantity'];
                $history->zin_history_quantity = $request['quantity'];
                $history->zin_history_type = $request['status'];
                $history->zin_history_description = $request['description'];
                $history->zin_history_time_updated = $date->get(
                'yyyy-MM-dd HH:mm:ss');
                $history->zin_history_time_created = $date->get(
                'yyyy-MM-dd HH:mm:ss');
                $history->save();
                $this->_redirect('administrator/addhistoryfinish');
            } else {
                $product = new Application_Model_Product();
                $product->zin_product_id = $request['product'];
                $choose = $product->fetchRow();
                $this->view->arrproduct = $arrProduct;
                $this->view->nickname = $request['nickname'];
                $this->view->username = $request['username'];
                $this->view->select = $request['product'];
                $this->view->id = $request['id'];
                $this->view->total = $request['total'];
                $this->view->quantity = $request['quantity'];
                $this->view->status = $request['status'];
                $this->view->description = $request['description'];
                $this->view->price = $choose->zin_product_price;
                $error = $valid->getMessages();
                $this->view->errorUsername = isset($error['username']) ? Zincome_Static::getMessages(
                $error['username']) : '';
                $this->view->errorNickname = isset($error['nickname']) ? Zincome_Static::getMessages(
                $error['nickname']) : '';
                $this->view->errorProduct = isset($error['product']) ? Zincome_Static::getMessages(
                $error['product']) : '';
                $this->view->errorQuantity = isset($error['quantity']) ? Zincome_Static::getMessages(
                $error['quantity']) : '';
                $this->view->errorTotal = isset($error['total']) ? Zincome_Static::getMessages(
                $error['total']) : '';
                $this->view->errorStatus = isset($error['status']) ? Zincome_Static::getMessages(
                $error['status']) : '';
            }
        } else {
            $product = new Application_Model_Product();
            $product->zin_product_id = 1;
            $choose = $product->fetchRow();
            $user = new Application_Model_User();
            $user->zin_user_id = $this->view->id;
            $user = $user->fetchRow();
            $this->view->arrproduct = $arrProduct;
            $this->view->nickname = $user->zin_user_nickname;
            $this->view->username = $user->zin_user_username;
            $this->view->price = $choose->zin_product_price;
        }
    }
    public function addhistoryfinishAction ()
    {
        // action body
    }
    public function updatecustomerAction ()
    {
        $this->view->Title = "Sửa Thông Tin Khách Hàng";
        $idcustomer = $this->getRequest()->getParam('customer');
        $user = new Application_Model_User();
        if ($idcustomer != null) {
            $this->view->id = $idcustomer;
            $user->zin_user_id = $idcustomer;
            $user = $user->fetchRow();
            $this->view->username = $user->zin_user_username;
            $this->view->nickname = $user->zin_user_nickname;
            $description = unserialize($user->zin_user_description);
            $this->view->cellphone = $description->zin_user_cellphone;
            $this->view->homephone = $description->zin_user_homephone;
            $this->view->email = $description->zin_user_email;
            $this->view->address = $description->zin_user_address;
        } else {
            $request = $this->getRequest();
            $ZForm = new Application_Form_Registercustomer();
            if ($this->getRequest()->isPost()) {
                if ($ZForm->isValid($this->_request->getPost())) {
                    $modelUserInfo = new Application_Model_UserInformation();
                    $modelUserInfo->zin_user_address = $request->getParam(
                    'address');
                    $modelUserInfo->zin_user_email = $request->getParam('email');
                    $modelUserInfo->zin_user_cellphone = $request->getParam(
                    'cellphone');
                    $modelUserInfo->zin_user_homephone = $request->getParam(
                    'homephone');
                    $modelUser = new Application_Model_User();
                    $modelUser->zin_user_username = $request->getParam(
                    'username');
                    $modelUser->zin_user_nickname = $request->getParam(
                    'nickname');
                    $modelUser->zin_user_password = $request->getParam(
                    'password');
                    $modelUser->zin_user_level = 0;
                    $modelUser->zin_user_description = $modelUserInfo->serialize();
                    $modelUser->zin_user_id = $request->getParam('id');
                    echo $request->getParam('id');
                    $modelUser->save();
                    $this->_redirect('/administrator/updatefinish');
                }
            }
            $error = $ZForm->getMessages();
            $this->view->username = $request->getParam('username');
            $this->view->nickname = $request->getParam('nickname');
            $this->view->password = $request->getParam('password');
            $this->view->comfirmpassword = $request->getParam('comfirmpassword');
            $this->view->cellphone = $request->getParam('cellphone');
            $this->view->homephone = $request->getParam('homephone');
            $this->view->email = $request->getParam('email');
            $this->view->address = $request->getParam('address');
            $this->view->id =  $request->getParam('id');
            $this->view->errorUsername = isset($error['username']) ? Zincome_Static::getMessages(
            $error['username']) : '';
            $this->view->errorNickname = isset($error['nickname']) ? Zincome_Static::getMessages(
            $error['nickname']) : '';
            $this->view->errorPassword = isset($error['password']) ? Zincome_Static::getMessages(
            $error['password']) : '';
            $this->view->errorComfirmpassword = isset($error['comfirmpassword']) ? Zincome_Static::getMessages(
            $error['comfirmpassword']) : '';
            $this->view->errorCellphone = isset($error['cellphone']) ? Zincome_Static::getMessages(
            $error['cellphone']) : '';
            $this->view->errorHomephone = isset($error['homephone']) ? Zincome_Static::getMessages(
            $error['homephone']) : '';
            $this->view->errorEmail = isset($error['email']) ? Zincome_Static::getMessages(
            $error['email']) : '';
            $this->view->errorAddress = isset($error['address']) ? Zincome_Static::getMessages(
            $error['address']) : '';
        }
    }
    public function viewhistoryAction ()
    {
       
    }
}























