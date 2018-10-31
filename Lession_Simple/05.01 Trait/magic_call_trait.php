<?php
/**
 * Использование статических методов
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 trait Call_Helper
 {
     public function __call($name, $args)
     {
         return count($args);
     }
 }

 class Foo
 {
     use Call_Helper;
 }

 $foo = new Foo();
 echo $foo->go(1, 2, 3, 4); // echoes 4
