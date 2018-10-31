<?php
/**
 * Создание класса
 * область видимиости перемнных, конструктор, деструктор
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 /**
  * Основные магические методы класса.
  * Базовый синтаксис
  */
 class myClass
 {
     /**
      * Блок объявления переменных - в дальнейшем называется свойства
      * обычно описывается до кода (функций) - в дальнейшем - методы
      */
     public $vPub;
     private $vPriv;
     protected $vProt;

     public static $name;

     /**
      * Конструктор класса
      * метод вызывается при каждом создании экземпляра класса
      */
     public function __construct()
     {
         echo '<p>Вызван конструктор</p>' . PHP_EOL;
         $this->vPub = rand();
         self::$name = 'static' . $this->vPub;
     }


     /**
      * Деструктор
      * вызывается при уничтожении класса
      */
     public function __destruct()
     {
         echo '<p>Экземпляр класса уничтожен</p>' . PHP_EOL;
     }

     /**
      * Внутренние переменные
      * self, this
      */
     public function echoV()
     {
         echo '<ul>'. PHP_EOL;
         echo '<li>__CLASS__ :' .__CLASS__ . '</li>'. PHP_EOL;
         echo '<li>self::$name - присвоено в конструкторе :' . self::$name . '</li>'. PHP_EOL;
         echo '<li>$this->vPub - внутренняя переемнная :' . $this->vPub . '</li>'. PHP_EOL;
         echo '<li>Что вообще содержит this: </li>'. PHP_EOL;
         echo '<li>' . var_dump($this) . '</li>'. PHP_EOL;
         echo '</ul>'. PHP_EOL;
     }


     /**
      * Магические методы класса
      * http://php.net/manual/ru/language.oop5.magic.php
      * Отвечает за различные методы поведения классов
      * при их обработке, клонировании и других операциях
      */


     /**
      * Клон
      * вызывается при клонировании класса
      */
     public function __clone()
     {
         echo '<p>Произошло клонирование объекта</p>' . PHP_EOL;
     }
 }
