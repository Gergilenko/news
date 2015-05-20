<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 18.05.2015
 * Time: 23:34
 */

namespace App\Classes;


class Pager {
    public static $display_pages = 5;
    public static $current_page = 1;
    public static $count;


    public static function getLinks($request) {

        $total_pages = ceil( self::$count / self::$display_pages);

        $out ='';
        for ($i = 1; $i <= $total_pages; $i++) {
            $out .= ($i == self::$current_page) ? "<span id='active'>" . $i . "</span>" : "<a href='" . $request . "/page/" . $i . "'>" . $i . "</a>";
        }

        return $out;
    }

}