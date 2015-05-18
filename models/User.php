<?php

namespace App\Models;

use App\Classes\AbstractModel;

/**
 * Class User
 * @property $id
 * @property $login
 * @property $password
 * @property $reg_date
 * @property $name
 */
class News extends AbstractModel {

    protected static $table = 'users';

}