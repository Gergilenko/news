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
    <?php include __DIR__ . '/../news/_signup.php'; ?>
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
                <div class="mhead"><h2>Список новостей</h2></div>
                <table id="adm_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Заголовок</th>
                            <th>Тема</th>
                            <th id="tbl_date">Добавлено</th>
                            <th id="tbl_edit">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo $item->id; ?></td>
                            <td class="tbl_title"><a href='<?php $this->url('admin/one/'. $item->id); echo "'>" . $item->title; ?></a></td>
                            <td><?php echo $item->topic; ?></td>
                            <td><?php echo $item->add_date; ?></td>
                            <td><a href='<?php $this->url('admin/edit/'. $item->id); ?>'>Править</a> <a href='<?php $this->url('admin/del/'. $item->id); ?>'>Удалить</a></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>


            </div>
        </div>
    </div>
</div>
</body>
</html>