<?php

class Application_Model_Example
{
    public function getUsers()
    {
        $db = Zend_Registry::get('Zend_Db');        
        $sql = "SELECT zin_user_username FROM zin_user";
        return $db->fetchAll($sql);    
    }
}

