<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 17.05.2015
 * Time: 13:54
 */

namespace App\Models;

use App\Classes\AbstractModel;

/**
 * Class Topic
 * @property $id
 * @property $title
 */
class Topic extends AbstractModel {

    protected static $table = 'topics';

}