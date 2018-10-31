<?php

class News extends Publication
{
    // конструктор класса новостей, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по новостям
        $this->table = 'phpoop_poli_news_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }

    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo $this->properties['title'];
        echo '<br /><br />';
        echo $this->properties['text'];
        echo '<br />Источник: '.$this->properties['source'];
    }
}
