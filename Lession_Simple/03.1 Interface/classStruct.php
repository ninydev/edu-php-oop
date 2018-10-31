<?php
/**
 * Создание классов с интерфейсами
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

/**
 *
 */
interface canSay
{
    public function someSay();
}

interface canLogic extends canSay
{
    public function someSayLogic();
}


/**
 *
 */
 abstract class Australopithecus
 {
     public $colorEye;
     private $colorHair;
     protected $logical;
 }

 /**
  *
  */
class Neanderthal extends Australopithecus implements canSay
{
    public function someSay()
    {
        echo 'can some say - Gav Gav';
    }
}

/**
 *
 */
final class Homosapiens extends Neanderthal implements canLogic
{
    public function someSay()
    {
        echo 'can say Hello';
    }
    public function someSayLogic()
    {
        echo 'can logic';
    }
}
