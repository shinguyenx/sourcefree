<?php
class Nov_Model_DbTable_AccountHistory extends Shanty_Mongo_Document
{
    protected static $_db = 'sourcefree';
    protected static $_collection = 'account.history';
    
    protected static $_requirements = array(
        'addresses' => 'DocumentSet',
        'addresses.$.street' => 'Required'
    );
}

