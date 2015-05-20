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
use App\Classes\Pager;

class News {


    public function actionIndex() {

        $news = Model::selectAll();

        Pager::$count = count($news);
        //Pager::$current_page = $_GET['page'];

        $view = new View();
        $view->items = $news;
        $view->menu = Menu::getMenu();
        $view->topics = Menu::getTopics();
        $view->display('news/index.php');
    }
    public function actionDate() {
        $news = Model::searchByColumn('add_date', $_GET['date']);

        Pager::$count = count($news);

        $view = new View();
        $view->items = $news;
        $view->menu = Menu::getMenu();
        $view->topics = Menu::getTopics();
        $view->display('news/index.php');
    }

    public function actionTopic() {

        $view = new View();
        $model = Model::selectByColumn('topic_id', $_GET['id']);
        $view->items = $model;

        $view->menu = Menu::getMenu();
        $view->topics = Menu::getTopics();
        $view->display('news/index.php');
    }

    public function actionOne() {
        if (empty($_GET['id'])) {
            View::redirect('/');
        }
        $view = new View;
        $view->item = Model::selectOneByPk($_GET['id']);
        if (empty($view->item)) {
            throw new \Exception('ActionOne: Страница не найдена по ID: ' . $_GET['id'], 404);
        }
        $view->display('news/one.php');
    }

}