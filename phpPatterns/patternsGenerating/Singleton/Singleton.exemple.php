<?php
/**
 * Президент может быть только один, и именно он привлекается к действию, когда это необходимо.
 * Президент – одиночка, и по аналогии наш паттерн контролирует создание лишь одного экземпляра класса.
 */

 /**
  * Сделайте конструктор закрытым, отключите клонирование, расширение и создайте статическую переменную для экземпляра:
  */

  final class President
  {
      private static $instance;

      private function __construct()
      {
          // Прячем конструктор
      }

      public static function getInstance(): President
      {
          if (!self::$instance) {
              self::$instance = new self();
          }

          return self::$instance;
      }

      private function __clone(){// Отключаем клонирование
      }

      private function __wakeup(){// Отключаем расширение
      }
  }

/**
 * Используем:
 */

$president1 = President::getInstance();
$president2 = President::getInstance();

var_dump($president1 === $president2); // истина


unset (President::$instance);
$tmp =  President::getInstance();
var_dump ($tmp);