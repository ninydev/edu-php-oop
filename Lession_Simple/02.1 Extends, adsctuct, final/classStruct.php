<?php
/**
 * Создание серии классов
 * Пример на эфолюции по Дарвину
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

/**
 *
 */
 abstract class Australopithecus
 {
     public $colorEye;
     private $colorHair;
     protected $logical;
     public function __construct()
     {
         echo '<p> Конструктор класса:' . __CLASS__ . '</p>' . PHP_EOL;
     }
 }

 /**
  *
  */
class Neanderthal extends Australopithecus
{
    public function __construct()
    {
        echo '<p> Конструктор класса:' . __CLASS__ . '</p>' . PHP_EOL;
    }
}

/**
 *
 */
final class Homosapiens extends Neanderthal
{
    public function __construct()
    {
        echo '<p> Конструктор класса:' . __CLASS__ . '</p>' . PHP_EOL;
        parent::__construct();
    }
}

/**
 *
 */
class God
{
    public function __construct()
    {
        echo '<p> Конструктор Бога' . __CLASS__ . '</p>' . PHP_EOL;
    }
    public function Help()
    {
        echo '<p>Я услышал твою просьбу</p>' . PHP_EOL;
    }
}
