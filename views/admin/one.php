<!DOCTYPE html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>NEWS</title>
    <link type="text/css" rel="stylesheet" href="<?php $this->url('views/css/style.css'); ?>">
</head>
<body>
<div id="container">
    <header>
        <h1><a href="/">НОВОСТИ</a></h1>
    </header>
    <table id="login">
        <tr><td>Приветствую, </td>
        </tr>
    </table>
    <div id="content">
        <div id="left">
            <div class="block">
                <div class="head">Админка</div>
                <ul>
                    <li><a href="<?php $this->url('news/index'); ?>">На Главную</a></li>
                    <li><a href="<?php $this->url('admin/new'); ?>">Добавить</a></li>
                    <li><a href="<?php $this->url('admin/index'); ?>">Список</a></li>
                    <li><a href="<?php $this->url('auth/logout'); ?>">Выйти</a></li>
                </ul>
            </div>
        </div>
        <div id="center">
            <div class="main">
                <div class="mhead"><h2><?php echo $item->title; ?></h2></div>
                <p><?php echo $item->text; ?></p>
                <p><a href="<?php $this->url('admin/index'); ?>">Все новости</a></p>
                <div class="mfoot">
                    <span class="topic">Тема: <?php echo $item->topic; ?></span>
                    <span class="posted">Опубликовано: <?php echo $item->add_date; ?></span>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>