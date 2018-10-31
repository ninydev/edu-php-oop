<?php
/**
 * Пользуетесь карточкой доступа, чтобы открыть дверь? Есть несколько вариантов открытия такой двери:
 * это можно сделать с помощью карты доступа или же через нажатие кнопки, которая обходит безопасность.
 * Главная функция двери – открываться, но также есть и дополнительный функционал.
 */

 /**
  * Есть интерфейс двери:
  */

  interface Door
{
    public function open();
    public function close();
}

class LabDoor implements Door
{
    public function open()
    {
        echo "Открывание".'<br>';
    }

    public function close()
    {
        echo "Закрывание".'<br>';
    }
}

/**
  * Ее защита:
  */

  class Security
  {
      protected $door;

      public function __construct(Door $door)
      {
          $this->door = $door;
      }

      public function open($password)
      {
          if ($this->authenticate($password)) {
              $this->door->open();
          } else {
              echo "Это невозможно.".'<br>';
          }
      }

      public function authenticate($password)
      {
          return $password === '$ecr@t';
      }

      public function close()
      {
          $this->door->close();
      }
  }

/**
  * Используем:
  */

$door = new Security(new LabDoor());
$door->open('invalid'); // Это невозможно.

$door->open('$ecr@t'); // Открывание
$door->close(); // Закрывание
