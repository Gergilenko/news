<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 13.05.2015
 * Time: 18:40
 */

namespace App\Models;

use App\Classes\AbstractModel;
use App\Classes\Db;

/**
 * Class News
 * @property $id
 * @property $title
 * @property $text
 * @property $add_date
 */
class News extends AbstractModel {

    protected static $table = 'news';

    public static function findAll() {
        $db = new Db;
        $sql = 'SELECT n.id, n.title, n.text, n.add_date, t.title as topic
                                          FROM news n JOIN topics t ON n.topic_id = t.id ORDER BY n.add_date DESC';
        $db->setClassName(get_called_class());
        return $db->query($sql);
    }

    public static function findOneByPk($id) {
        $db = new Db;
        $sql = 'SELECT n.id, n.title, n.text, n.add_date, t.title as topic
                                          FROM news n JOIN topics t ON n.topic_id = t.id WHERE n.id=:id';
        $db->setClassName(get_called_class());
        $result = $db->queryRow($sql, [':id' => $id]);
        if (!empty($result)) {
            return $result;
        }
        return false;
    }

}