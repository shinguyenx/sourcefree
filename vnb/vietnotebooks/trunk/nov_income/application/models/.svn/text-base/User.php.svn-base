<?php
class Application_Model_User implements Zincome_ZinService_IUser
{
    public $zin_user_id;
    public $zin_user_nickname;
    public $zin_user_username;
    public $zin_user_password;
    public $zin_user_description;
    public $zin_user_level;
    
    
    
    public static function cast ($array)
    {
        $entry = new Application_Model_User();
        $entry->zin_user_id = $array['zin_user_id'];
        $entry->zin_user_nickname = $array['zin_user_nickname'];
        $entry->zin_user_password = $array['zin_user_password'];
        $entry->zin_user_level = $array['zin_user_level'];
        $entry->zin_user_description = $array['zin_user_description'];
        $entry->zin_user_username = $array['zin_user_username'];
        return $entry;
    }
    
    
    private function setDbTable ($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (! $dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        return $dbTable;
    }
    
    private function getDbTable ()
    {
        return $this->setDbTable('Application_Model_DbTable_User');
    }
    

	public function delete ()
    {
        $where = $this->getDbTable()->getAdapter()->quoteInto('zin_user_id != ?', $this->zin_user_id);
        return $this->getDbTable()->delete($where);
    }

	public function fetchRow ()
    {
       
    	$arr = ($this->getDbTable()->find($this->zin_user_id)->toArray());
    	return  Application_Model_User::cast($arr[0]);
    }

	public function fetchRows ()
    {
        $select  = $this->getDbTable()->select()->order('zin_user_id DESC');
        $resultSet = $this->getDbTable()->fetchAll($select);
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = Application_Model_User::cast($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
        
    }
    
	public function save ()
    {
        $data = (get_object_vars($this));
        if (null === ($id = $this->zin_user_id)) {
            unset($data['zin_user_id']);
            return $this->getDbTable()->insert($data);
        } else {
            return $this->getDbTable()->update($data, 
            array('zin_user_id = ?' => $id));
        }
    }

	public static function getAuthAdapter ()
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable(
        Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('zin_user') // setTableName [ table ]
                    ->setIdentityColumn('zin_user_username') // setIdentityColumn [ username ]
                    ->setCredentialColumn('zin_user_password'); // setCredentialColumn [ password ]
        return $authAdapter;
        
    }
    
}


