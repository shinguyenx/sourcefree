<?php

class Application_Model_Product implements Zincome_ZinService_IProduct
{
	public $zin_product_id;
	public $zin_product_name;
	public $zin_product_price;
	public $zin_product_time_updated;
	public $zin_product_description;
	
	public static function cast ($array)
    {
        $entry = new Application_Model_Product();
        $entry->zin_product_id = $array['zin_product_id'];
        $entry->zin_product_name = $array['zin_product_name']; 
        $entry->zin_product_price = $array['zin_product_price'];
        $entry->zin_product_time_updated = $array['zin_product_time_updated'];
        $entry->zin_product_description = $array['zin_product_description'];
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
        return $this->setDbTable('Application_Model_DbTable_Product');
    }
	
	public function delete ()
    {
        $where = $this->getDbTable()->getAdapter()->quoteInto('zin_product_id != ?', $this->zin_product_id);
        return $this->getDbTable()->delete($where);
    }

	public function fetchRow ()
    {
        $product =  $this->getDbTable()->find($this->zin_product_id)->toArray();
        return Application_Model_Product::cast($product[0]);
    }

	public function fetchRows ()
    {
        $select  = $this->getDbTable()->select()->order('zin_product_id DESC');
        $resultSet = $this->getDbTable()->fetchAll($select);
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = Application_Model_Product::cast($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
	public function save ()
    {
        $data = (get_object_vars($this));
        if (null === ($id = $this->zin_product_id)) {
            unset($data['zin_product_id']);
            return $this->getDbTable()->insert($data);
        } else {
            return $this->getDbTable()->update($data, 
            array('zin_product_id = ?' => $id));
        }
    }
}

