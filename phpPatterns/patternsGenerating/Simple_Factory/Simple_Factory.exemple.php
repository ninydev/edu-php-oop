<?php
/**
 * Предположим, вы строите дом, и вам необходим проход. Было бы глупо всякий раз, когда нужна дверь,
 * облачаться в одежду плотника, чтобы мастерить ее. Вместо этого вы получаете дверь с «завода».
 * Паттерн предназначен для инкапсуляции процесса образования объектов с помощью отдельного класса.
 * «Простая Фабрика» удобна, но за простоту приходится платить: привязка к конкретной реализации исключает
 * гибкость системы. Simple Factory следует использовать только там, где архитектура не будет изменяться.
 */

 /**
  * Допустим, у нас есть интерфейс двери:
  */

  interface Door
  {
      public function getWidth(): float;
      public function getHeight(): float;
  }

  class WoodenDoor implements Door
  {
      protected $width;
      protected $height;

      public function __construct(float $width, float $height)
      {
          $this->width = $width;
          $this->height = $height;
      }

      public function getWidth(): float
      {
          return $this->width;
      }

      public function getHeight(): float
      {
          return $this->height;
      }
  }

/**
 * Далее появляется завод, который изготавливает дверь и возвращает ее нам:
 */

 class DoorFactory
 {
     public static function makeDoor($width, $height): Door
     {
         return new WoodenDoor($width, $height);
     }
 }

 /**
  * И только после этого мы можем воспользоваться нашей дверью:
  */

$door = DoorFactory::makeDoor(100, 200);
echo 'Ширина: ' . $door->getWidth().'<br>';
echo 'Высота: ' . $door->getHeight().'<br>';
