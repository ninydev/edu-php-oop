<?php
/**
 * Создание класса
 * область видимиости перемнных, конструктор, деструктор
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 require_once('myClass.php');

 echo '<h3>Создаем экземпляр класса</h3>';
 $fClass = new myClass();
 $fClass->echoV();

 echo '<h3>Создаем другой экземпляр класса</h3>';
 $tmpClass = new myClass();
 $tmpClass->echoV();

 echo '<h3>Клонируем класс</h3>';
 $cloneClass = clone $tmpClass;
 $cloneClass->echoV();
