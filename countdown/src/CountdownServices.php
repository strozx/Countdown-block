<?php
/**
 * Created by PhpStorm.
 * User: nikst
 * Date: 8. 10. 2018
 * Time: 19:23
 */

namespace Drupal\countdown;

class CountdownServices{

    public function __construct()
    {
    }

    public function calc_dates($epoch){
        $time = time();
        $difference = $epoch - $time;
        $days_left = round($difference / 60 / 60 / 24,0,PHP_ROUND_HALF_UP); //calculates days from epoch time and round up the number
        if ($days_left>=0 && $days_left<1){
            $days_left = "This event is happening today.";
        }
        else if ($days_left<0){
            $days_left="The event has ended.";
        }
        else if($days_left>=1){
            $days_left="Day's left to event start: ".$days_left;
        }
        return $days_left;
    }
}