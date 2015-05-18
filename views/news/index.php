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
    <?php include __DIR__ . '/_signup.php'; ?>
    <div id="content">
        <div id="left">
            <?php include __DIR__ . '/_menu.php'; ?>
        </div>
        <div id="center">

            <?php foreach ($items as $item): ?>
                <div class="main">
                    <div class="mhead"><h2><?php echo $item->title; ?></h2></div>
                    <p><?php echo (mb_strlen($item->text) > 256) ? mb_substr($item->text, 0, 256, 'UTF-8')." ..." : $item->text; ?></p>
                    <p><a href="<?php $this->url('news/one/' . $item->id); ?>">Читать далее</a></p>
                    <div class="mfoot">
                        <span class="topic">Тема: <?php echo $item->topic; ?></span>
                        <span class="posted">Опубликовано: <?php echo $item->add_date; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
</body>
</html>