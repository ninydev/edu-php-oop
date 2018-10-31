<?php
/**
 * Создание классов из наследования
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 require_once('classStruct.php');

 echo '<h3>Создаем экземпляр человека</h3>';
 $man = new Homosapiens();
 $man->someSay();
 $man->someSayLogic();



// $tmp = new Australopithecus();

/*
class Indigo extends Homosapiens
{
}
*/
