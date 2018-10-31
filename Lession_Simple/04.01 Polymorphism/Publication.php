<?php

abstract class Publication
{
    // таблица, в которой хранятся данные по элементу
    protected $table;

    // свойства элемента нам неизвестны
    protected $properties = array();

    // конструктор
    public function __construct($id)
    {
        // обратите внимание, мы не знаем, из какой таблицы нам нужно получить данные
        $myDB = new mysqli(DB_HOST . ':' . DB_PORT, DB_USER, DB_PSWD, DB_NAME);
	if ($myDB->connect_errno) {
		echo "Не удалось подключиться к MySQL: (" . $MySql_Driver->connect_errno . ") " . $MySql_Driver->connect_error;
		die ("Работа прервана");
	}
        $result = $myDB->query ('SELECT * FROM `'.$this->table.'` WHERE `id`="'.$id.'" LIMIT 1');
        // какие мы получили данные, мы тоже не знаем
        $this->properties = $result->fetch_array();
    }

    // метод, одинаковый для любого типа публикаций, возвращает значение свойства
    public function get_property($name)
    {
        if (isset($this->properties[$name]))
            return $this->properties[$name];

        return false;
    }

    // метод, одинаковый для любого типа публикаций, устанавливает значение свойства
    public function set_property($name, $value)
    {
        if (!isset($this->properties[$name]))
            return false;

        $this->properties[$name] = $value;

        return $value;
    }

    // а этот метод должен напечатать публикацию, но мы не знаем, как именно это сделать, и потому объявляем его абстрактным
    abstract public function do_print();
}
