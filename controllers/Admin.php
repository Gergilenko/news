<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 14.05.2015
 * Time: 1:16
 */

namespace App\Controllers;

use App\Models\News;
use App\Models\Topic;
use App\Classes\View;


class Admin {

    public function actionIndex() {
        $view = new View();
        $view->items = News::findAll();
        $view->display('admin/index.php');
    }

    public function actionOne() {
        if (empty($_GET['id'])) {
            View::redirect('/admin/index');
        }
        $view = new View;
        $view->item = News::findOneByPk($_GET['id']);
        if (empty($view->item)) {
            throw new \Exception('ActionOne: Страница не найдена по ID: ' . $_GET['id'], 404);
        }
        $view->display('admin/one.php');
    }

    public function actionNew() {

        $view = new View;
        $view->topics = Topic::findAll();
        $view->display('admin/new.php');
    }

    public function actionAdd() {

        if (!empty($_POST['title']) && !empty($_POST['text'])) {
            $news = new News;
            $news->title = substr($_POST['title'], 0, 100);
            $news->text = $_POST['text'];
            $news->topic_id = $_POST['topic_id'];
            $news->add_date = date('Y-m-d');
            $news->save();
        }
        View::redirect('/admin/index');
    }

    public function actionEdit() {

        if (empty($_GET['id'])) {
            View::redirect('/admin/index');
        }
        $view = new View;
        $view->news = News::findOneByPk($_GET['id']);
        $view->topics = Topic::findAll();

        //var_dump($view);die;
        if (empty($view->news)) {
            throw new \Exception('ActionEdit: Страница не найдена по ID: ' . $_GET['id'], 404);
        }
        $view->display('admin/edit.php');
    }

    public function actionSave() {
        if (!empty($_POST['id']) && isset($_POST['add_date'])) {
            if (isset($_POST['title']) && isset($_POST['text'])) {
                $news = new News;
                $news->add_date = $_POST['add_date'];
                $news->topic_id = $_POST['topic_id'];
                $news->title = substr($_POST['title'], 0, 100);
                $news->text = $_POST['text'];
                $news->id = $_POST['id'];
                $news->save();
            }
        }
        View::redirect('/admin/index');
    }

    public function actionDel() {
        if (!empty($_GET['id'])) {
            $news = new News;
            $news->id = $_GET['id'];
            $news->delete();
        }
        View::redirect('/admin/index');
    }

}