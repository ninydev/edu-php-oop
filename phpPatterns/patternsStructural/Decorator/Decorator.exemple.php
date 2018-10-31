<?php
/**
 * В отличие от статического механизма наследования, паттерн Decorator работает динамически.
 * Он может добавлять объектам необходимую функциональность в процессе.
 */

 /**
  * Рассмотрим в качестве примера кофе. Прежде всего, у нас есть простой кофе с соответствующим интерфейсом:
  */

  interface Coffee
{
    public function getCost();
    public function getDescription();
}

class SimpleCoffee implements Coffee
{
    public function getCost()
    {
        return 10;
    }

    public function getDescription()
    {
        return ' Простой кофе';
    }
}

/**
  * Но мы хотим добавить дополнительные параметры:
  */

  class MilkCoffee implements Coffee
  {
      protected $coffee;

      public function __construct(Coffee $coffee)
      {
          $this->coffee = $coffee;
      }

      public function getCost()
      {
          return $this->coffee->getCost() + 2;
      }

      public function getDescription()
      {
          return $this->coffee->getDescription() . ', молоко';
      }
  }

  class WhipCoffee implements Coffee
  {
      protected $coffee;

      public function __construct(Coffee $coffee)
      {
          $this->coffee = $coffee;
      }

      public function getCost()
      {
          return $this->coffee->getCost() + 5;
      }

      public function getDescription()
      {
          return $this->coffee->getDescription() . ', сливки';
      }
  }

  class VanillaCoffee implements Coffee
  {
      protected $coffee;

      public function __construct(Coffee $coffee)
      {
          $this->coffee = $coffee;
      }

      public function getCost()
      {
          return $this->coffee->getCost() + 3;
      }

      public function getDescription()
      {
          return $this->coffee->getDescription() . ', ваниль';
      }
  }

  /**
    * Теперь сделаем наш кофе:
    */

$someCoffee = new SimpleCoffee();
echo $someCoffee->getCost(); // 10
echo $someCoffee->getDescription().'<br>'; // Простой кофе

$someCoffee = new MilkCoffee($someCoffee);
echo $someCoffee->getCost(); // 12
echo $someCoffee->getDescription().'<br>'; // Простой кофе, молоко

$someCoffee = new WhipCoffee($someCoffee);
echo $someCoffee->getCost(); // 17
echo $someCoffee->getDescription().'<br>'; // Простой кофе, молоко, сливки

$someCoffee = new VanillaCoffee($someCoffee);
echo $someCoffee->getCost(); // 20
echo $someCoffee->getDescription().'<br>'; // Простой кофе, молоко, сливки, ваниль
