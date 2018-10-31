<?php
/**
 * Использование статических методов
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 trait Beer
 {
     protected static $type = 'Light';
     public static function printed()
     {
         echo static::$type.PHP_EOL;
     }
     public static function setType($type)
     {
         static::$type = $type;
     }
 }

 class Ale
 {
     use Beer;
 }

 Beer::setType("Dark");

 class Lager
 {
     use Beer;
 }

 Beer::setType("Amber");

 header("Content-type: text/plain");

 Beer::printed();  // Prints: Amber
 Ale::printed();   // Prints: Light
 Lager::printed(); // Prints: Dark
