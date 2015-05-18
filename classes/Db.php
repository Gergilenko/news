<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:48
 */

namespace App\Classes;

class Db {

    private $dbh;
    private $className = 'stdClass';

    public function __construct() {

        $dsn = 'mysql:dbname=' . DB_BASE . ';host=' . DB_HOST;
        $this->dbh = new \PDO($dsn, DB_USER, DB_PASSWORD);
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function setClassName($className) {
        $this->className = $className;
    }

    public function query($sql, $params = []) {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);
    }

    public function queryAssoc($sql, $params = []) {

    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function queryRow($sql, $params = []) {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchObject($this->className);
    }

    public function queryRowAssoc($sql, $params = []) {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetch();
    }

    public function exec($sql, $params = []) {

        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
}
