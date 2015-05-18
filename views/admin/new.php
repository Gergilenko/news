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
                <div class="mhead"><h2>Добавить новость</h2></div>
                    <form action="<?php $this->url('admin/add'); ?>" method="post">
                    <p class="sel_topic"><select  name="topic_id" required>
                            <option></option>
                            <?php foreach ($topics as $item): ?>
                            <option value="<?php echo $item->id; ?>"><?php echo $item->title; ?></option>
                            <?php endforeach; ?>
                        </select></p>
                    <p><input type="text" placeholder="Заголовок" name="title" required></p>
                    <p><textarea name="text" placeholder="Текст новости..." rows="10" wrap="soft" required></textarea></p>
                    <p><input type="submit" value="сохранить"></p>
                    </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>