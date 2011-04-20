<?php
class incomeController extends Zend_Controller_Action
{
    public function init ()
    {
        /* Initialize action controller here */
    }
    public function indexAction ()
    {
        $this->view->Title = 'Thống Kê';
        $history = new Application_Model_History();
        $history = $history->fetchRows();
        $this->view->listHistory = $history;
    }
    public function showAction ()
    {
        $users = new Application_Model_User();
        $users->zin_register();
    }
    public function registerAction ()
    {
        $this->view->Title = 'Tạo Khách Hàng';
         // action body
    }
    public function productAction ()
    {
        // action body
    }
    public function registerfinishAction ()
    {
        // action body
    }
    public function registerfailAction ()
    {
        // action body
    }
    public function aboutusAction ()
    {
        $this->view->Title = "Trang Chủ :: Thông Tin Trang Web";
         // action body
    }
    public function contactAction ()
    {
        $this->getHelper('viewRenderer')->setNoRender(true);
        $server = new Zend_Soap_Server();
        $server->setUri('http://localhost/income/contact');
        $server->setClass('Application_Model_Example');
        $server->handle();
    }
    public function helpAction ()
    {
        // action body
    }
    public function pages404Action ()
    {
        $this->view->Title = 'Trang không tồn tại';
    }
    public function calendarAction ()
    {
        $this->view->Style = '<link rel="stylesheet" href="/css/master.css" type="text/css" media="screen" charset="utf-8" />';
    }
    public function showhistoryAction ()
    {
        $listhistory = new Application_Model_History();
        $this->view->id = $this->_request->getParam('id');
        $listhistory->zin_user_ref = $this->_request->getParam('id');
        $this->view->listHistory = $listhistory->fetchRowsByIDUser();
    }
}























