<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 18.05.2015
 * Time: 16:18
 */

namespace App\Models;

use App\Classes\Db;


class Menu {

    public static function getMenu(){
        //get sorted 'add_date' field "YEAR-MM-DD" and put in $array  cutting "-DD" part
        $sql = 'SELECT add_date FROM news ORDER BY add_date DESC';
        $db = new Db;
        $array = [];
        foreach ($db->queryAssoc($sql) as $column){
            $array[] = substr($column['add_date'], 0, 7);
        }
        //create array with unique values "YEAR-MM"
        $array = array_unique($array);

        //count news for each month
        //create $array = ["YEAR", "MM", "count"]
        foreach ($array as &$date){
            $sql = "SELECT COUNT(*) AS count FROM news WHERE add_date LIKE '" . $date . "%'";
            $result_set = $db->queryRowAssoc($sql);
            $date = explode("-", $date);
            $date[] = $result_set['count'];
        }
        unset($date);
        $menu = [];
        //create array $menu = ["YEAR" => ["MM" => count, ...], ...]
        foreach ($array as $date){
            //if "YEAR" index is present -> add "MM" to array
            if (isset($menu[$date[0]]))
                $menu[$date[0]][$date[1]] =  $date[2];
            else
                $menu[$date[0]] = ["$date[1]" => $date[2]];
        }
        return $menu;
    }

    public static function getTopics(){

        $sql = 'SELECT t.title, t.id, count(*) as count FROM topics t
                                                  JOIN news n ON t.id=n.topic_id
                                                  GROUP BY t.title ORDER BY count DESC';
        $db = new Db;
        return $db->queryAssoc($sql);
    }

}