<?php
include_once ('config.php');
include_once ('Publication.php');
include_once ('News.php');
include_once ('Announcement.php');
include_once ('Article.php');


// наполняем массив публикаций объектами, производными от Publication
$publications[] = new News(1);
$publications[] = new Announcement(1);
$publications[] = new Article(1);

foreach ($publications as $publication) {
    // если мы работаем с наследниками Publication
    if ($publication instanceof Publication) {
        // то печатаем данные
        $publication->do_print();
        echo '<hr>';
    } else {
        // исключение или обработка ошибки
    }
}
