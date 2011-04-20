<?php
final class Zincome_Date
{
    /**
     * Enter description here ...
     * @param int $count [ so ngay trong thang ]
     */
    public static function getDaysToday ($zend_date)
    {
        $date = $zend_date;
        $days = $date->get(Zend_Date::MONTH_DAYS);
        $dayinmonths = 42;
        $dayinweeks = 6;
        $date->setDay(1);
        $day_first = $date->get(Zend_Date::WEEKDAY_DIGIT);
        $date = $zend_date;
        $date->setDay($days);
        $day_last = $date->get(Zend_Date::WEEKDAY_DIGIT);
        $numdayFirst = $dayinweeks - ($dayinweeks - $day_first);
        $numdayLast = $dayinweeks - $day_last;
        $rows = 4;
        $cols = 6;
        $arr = array();
        $n = 1;
        for ($i = 0; $i <= $rows; $i ++) {
            for ($r = 0; $r <= $cols; $r ++) {
                if ($r < $numdayFirst && $i == 0) {
                    $arr[$i][$r] = '<td class="padding"></td>';
                } else 
                    if ($n > $days) {
                        $arr[$i][$r] = '<td class="padding"></td>';
                    } else 
                        if ($n >= 1 && $n <= $days) {
                            $daynow = Zend_Date::now();
                            if ($daynow->get(Zend_Date::DAY) == $n) {
                                $arr[$i][$r] = '<td class="today">' . $n . '</td>';
                            } else {
                                $arr[$i][$r] = '<td class="showday" original-title="Chuyển sang trạng thái đã thanh toán">' .
                                 $n . '</td>';
                            }
                        }
                if ($r >= $numdayFirst) {
                    $n ++;
                } else 
                    if ($n != 1) {
                        $n ++;
                    }
            }
        }
        return $arr;
    }
    public static function getDaysToday_2 ($zend_date)
    {
        $date = $zend_date;
        $days = $date->get(Zend_Date::MONTH_DAYS);
        $dayinmonths = 42;
        $dayinweeks = 6;
        $date->setDay(1);
        $day_first = $date->get(Zend_Date::WEEKDAY_DIGIT);
        $date = $zend_date;
        $date->setDay($days);
        $day_last = $date->get(Zend_Date::WEEKDAY_DIGIT);
        $numdayFirst = $dayinweeks - ($dayinweeks - $day_first);
        $numdayLast = $dayinweeks - $day_last;
        $rows = 4;
        $cols = 6;
        $arr = array();
        $n = 1;
        for ($i = 0; $i <= $rows; $i ++) {
            for ($r = 0; $r <= $cols; $r ++) {
                if ($r < $numdayFirst && $i == 0) {
                    $arr[$i][$r] = '<td class="padding"></td>';
                } else 
                    if ($n > $days) {
                        $arr[$i][$r] = '<td class="padding"></td>';
                    } else 
                        if ($n >= 1 && $n <= $days) {
                            $daynow = Zend_Date::now();
                            if ($daynow->get(Zend_Date::DAY) == $n) {
                                $arr[$i][$r] = '<td class="today">' . $n . '</td>';
                            } else {
                                $arr[$i][$r] = '<td class="showday" original-title="Chuyển sang trạng thái đã thanh toán">' .
                                 $n . '</td>';
                            }
                        }
                if ($r >= $numdayFirst) {
                    $n ++;
                } else 
                    if ($n != 1) {
                        $n ++;
                    }
            }
        }
        return $arr;
    }
}
?>