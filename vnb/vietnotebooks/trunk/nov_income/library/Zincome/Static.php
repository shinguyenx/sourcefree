<?php
class Zincome_Static
{
    public static function getMessages($array){
        $str = "<ul style='display:list-item'>";
        foreach ($array as $value) {
                $str .= '<li><font color="red"> ■  '. $value .'</font></li>';
        }
        $str .= "</ul>";
        return $str;
    }
    
    public static function getCurrency($price){
    	$currency = new Zend_Currency(array(
                           'value'      =>$price,
                           'currency'   =>'VND',
                           'symbol'      =>'<a class="changestatus" original-title="Việt Nam Đồng" href="http://vi.wikipedia.org/wiki/%C4%90%E1%BB%93ng_(ti%E1%BB%81n)">₫</a>',
                           'display'   =>2,
                           'precision'   =>0,
                           'number_format' => '#.##0.00',
                           'locale'      =>'de',
                           'position'   =>Zend_Currency::RIGHT)); 
    	return  $currency;
    }
    
    public static function getUserByID($userID){
    	$user = new Application_Model_User();
    	$user->zin_user_id = $userID;
    	return $user->fetchRow();
    }
    
	public static function getProductByID($productID){
    	$product = new Application_Model_Product();
    	$product->zin_product_id = $productID;
    	return $product->fetchRow();
    }
    
	public static function getTypeByInt($type){
		if($type ==2)
			return '<b><font color="green">Đã Thanh Toán</font></b>';
		else 
			return '<b><font color="red">Chưa Thanh Toán</font></b>';
    }
    
    public static function getDateTime($time){
        $date = new Zend_Date($time,null,'vi');
        $str = "";
        $str = '<span class="showday" original-title="'. $date->get(Zend_Date::DATE_FULL) .'">' . $date->get(Zend_Date::HOUR) . " Giờ " . $date->get(Zend_Date::MINUTE) . " Phút</span>";
        return $str;
    }
    
    public static function getDate($time){
        $date = new Zend_Date($time,null,'vi');
        $str = "";
        $str = '<span>' . $date->get(Zend_Date::DATE_FULL) . '</span>';
        return $str;
    }
    
    public static function getDaysMonth($month,$year){
       $date = new Zend_Date();
       $date->setMonth($month);
       $date->setYear($year);
       $days = $date->get(Zend_Date::MONTH_DAYS);
       $day = array();
       for ($i = 1; $i <= $days ;  $i++) {
           $day[] = $i;
       }
       return $day;
    }
}
?>