<?php
/**
 * Создание простых трайтов
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 trait Hello
 {
     public function sayHello()
     {
         echo 'Hello ';
     }
 }

 trait World
 {
     public function sayWorld()
     {
         echo 'World';
     }
 }

 class MyHelloWorld
 {
     use Hello, World;
     public function sayExclamationMark()
     {
         echo '!';
     }
 }

 $o = new MyHelloWorld();
 $o->sayHello();
 $o->sayWorld();
 $o->sayExclamationMark();
