<?php
/**
 * Вернемся к примеру из Simple Factory. Может понадобиться деревянная дверь, металлическая или пластиковая.
 * Разные типы дверей поставляются из разных магазинов, да и специалисты должны быть соответствующие:
 * плотник, сварщик и т. д. Нам нужна «Абстрактная Фабрика», которая объединяет разные,
 * но связанные фабрики без указания их конкретных классов.
 */

 /**
  * Есть интерфейс двери и некоторые этапы реализации для нее :
  */

  interface Door
  {
      public function getDescription();
  }

  class WoodenDoor implements Door
  {
      public function getDescription()
      {
          echo 'Я деревянная дверь'.'<br>';
      }
  }

  class IronDoor implements Door
  {
      public function getDescription()
      {
          echo 'Я железная дверь'.'<br>';
      }
  }

/**
 * Получаем экспертов для каждого типа дверей:
 */

 interface DoorFittingExpert
{
    public function getDescription();
}

class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'Я могу подобрать только железные двери'.'<br>';
    }
}

class Carpenter implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'Я могу подобрать только деревянные двери'.'<br>';
    }
}

 /**
  * Имеем ту самую Abstract Factory для создания семейства объектов:
  */

  interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}

// Завод по работе с деревом и плотник
class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

// Завод по производству железных дверей и сварщик
class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}

/**
  * Используем:
  */

$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // На выходе: я деревянная дверь
$expert->getDescription(); // На выходе: я могу установить только деревянную дверь

// То же для завода по изготовлению железных дверей
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // На выходе: я железная дверь
$expert->getDescription(); // На выходе: я могу установить только железную дверь
