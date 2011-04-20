<?php
class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->Title = "Tài Khoản";
                        echo '<pre>';
                        print_r ($this->_request->getParams());
                        echo '</pre>';
    }

    public function loginAction()
    {
        $this->view->Title = "Tài Khoản :: Đăng Nhập";
                        if (Zend_Auth::getInstance()->hasIdentity()) {
                            $this->_redirect('/account/loginfinish');
                        }
                        $request = $this->getRequest();
                        $ZForm = new Application_Form_LoginForm();
                        if ($this->getRequest()->isPost()) {
                            if ($ZForm->isValid($this->_request->getPost())) {
                                $authAdapter = Application_Model_User::getAuthAdapter();             
                                $username = $ZForm->getValue('username');
                                $password = $ZForm->getValue('password');
                                $authAdapter->setIdentity($username)->setCredential($password);
                                $auth = Zend_Auth::getInstance();
                                $result = $auth->authenticate($authAdapter);
                                if ($result->isValid()) {
                                    $identity = Application_Model_User::cast(
                                    get_object_vars($authAdapter->getResultRowObject()));
                                    $authStorege = $auth->getStorage();
                                    $authStorege->write($identity);
                                    $this->_redirect('/account/loginfinish');
                                } else {
                                    $this->view->loginfail = 
                                    '<div class="msg msg-error">
                                    <p><strong>Tên đăng nhập và password không chính xác !</strong>
                                    </p>
                                    <a href="#" class="close" original-title="Xóa thông báo này !">close</a>
                                    </div>';
                                }
                            }
                        }
                        $error = $ZForm->getMessages();
                        $this->view->username = $request->getParam('username');
                        $this->view->password = $request->getParam('password');
                        $this->view->errorUsername = isset($error['username'])? Zincome_Static::getMessages($error['username']) : '';
                        $this->view->errorPassword = isset($error['password'])? Zincome_Static::getMessages($error['password']) : '';
    }

    public function logoutAction()
    {
        $this->view->Title = "Tài Khoản :: Thoát";
                                                Zend_Auth::getInstance()->clearIdentity();
                                                $this->_redirect('/account/login');
    }

    public function registerAction()
    {
        $this->view->Title = "Tài Khoản :: Đăng Ký";
                                                // action body
    }

    public function registerfinishAction()
    {
        // action body
    }

    public function loginfinishAction()
    {
        $this->view->Title = "Tài Khoản :: Thông Báo";
                                if(!Zend_Auth::getInstance()->hasIdentity()){
                                    $this->_redirect('/account/login');
                                }
                                // action body
    }

    public function informationAction()
    {
        // action body
    }
}

















