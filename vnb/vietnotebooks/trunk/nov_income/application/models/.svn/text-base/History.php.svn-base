<?php

class Application_Model_History implements Zincome_ZinService_IHistory
{
	public $zin_history_id;
	public $zin_user_ref;
	public $zin_product_ref;
	public $zin_history_total;
	public $zin_history_description;
	public $zin_history_quantity;
	public $zin_history_time_created;
	public $zin_history_time_updated;
	public $zin_history_type;
	
	public static function cast ($array)
    {
        $entry = new Application_Model_History();
        $entry->zin_history_id = $array['zin_history_id'];
        $entry->zin_user_ref = $array['zin_user_ref'];
        $entry->zin_product_ref = $array['zin_product_ref'];
        $entry->zin_history_total = $array['zin_history_total'];
        $entry->zin_history_description = $array['zin_history_description'];
        $entry->zin_history_quantity = $array['zin_history_quantity'];
        $entry->zin_history_time_created = $array['zin_history_time_created'];
        $entry->zin_history_time_updated = $array['zin_history_time_updated'];
        $entry->zin_history_type = $array['zin_history_type'];
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
        return $this->setDbTable('Application_Model_DbTable_History');
    }
	
	public function delete ()
    {
        $where = $this->getDbTable()->getAdapter()->quoteInto('zin_history_id != ?', $this->zin_history_id);
        return $this->getDbTable()->delete($where);
    }

	public function fetchRow ()
    {
        return $this->getDbTable()->find($this->zin_history_id);
    }

	public function fetchRows ()
    {
        $select  = $this->getDbTable()->select()->order('zin_history_id DESC');
        $resultSet = $this->getDbTable()->fetchAll($select);
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = Application_Model_History::cast($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function fetchRowsByIDUser ()
    {
        $select  = $this->getDbTable()->select()->where('zin_user_ref = ?',$this->zin_user_ref)->order('zin_history_id DESC');
        $resultSet = $this->getDbTable()->fetchAll($select);
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = Application_Model_History::cast($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
	public function save ()
    {
        $data = (get_object_vars($this));
        if (null === ($id = $this->zin_history_id)) {
            unset($data['zin_history_id']);
            return $this->getDbTable()->insert($data);
        } else {
            return $this->getDbTable()->update($data, 
            array('zin_history_id = ?' => $id));
        }
    }

}

