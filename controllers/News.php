<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:55
 */

namespace App\Controllers;

use App\Models\News as Model;
use App\Models\Menu;
use App\Classes\View;

class News {

    public function actionIndex() {
        $view = new View();
        $view->items = Model::findAll();
        $view->menu = Menu::getMenu();
        $view->topics = Menu::getTopics();
        $view->display('news/index.php');
    }

    public function actionOne() {
        if (empty($_GET['id'])) {
            View::redirect('/');
        }
        $view = new View;
        $view->item = Model::findOneByPk($_GET['id']);
        if (empty($view->item)) {
            throw new \Exception('ActionOne: Страница не найдена по ID: ' . $_GET['id'], 404);
        }
        $view->display('news/one.php');
    }

}