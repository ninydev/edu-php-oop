<?php
class Article extends Publication
{
    // конструктор класса статей, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по статьям
        $this->table = 'phpoop_poli_articles_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }

    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo $this->properties['title'];
        echo '<br /><br />';
        echo $this->properties['text'];
        echo '<br />&copy; '.$this->properties['author'];
    }
}
