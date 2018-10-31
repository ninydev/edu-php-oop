<?php
class Announcement extends Publication
{
    // конструктор класса объявлений, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по объявлениям
        $this->table = 'phpoop_poli_announcements_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }

    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo $this->properties['title'];
        echo '<br />Внимание! Объявление действительно до '.$this->properties['end_date'];
        echo '<br /><br />'.$this->properties['text'];
    }
}
