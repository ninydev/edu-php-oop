<?php
/**
 * Вы зашли в ресторан быстрого питания, заказали гамбургер, и вам его приготовили.
 * Но представьте, что нужно индивидуальное приготовление с определенным хлебом, соусом,
 * сыром и т. д. Здесь поможет шаблон «Строитель», который отвечает за процесс поэтапного создания объекта.
 */

 /**
  * У нас есть желаемый гамбургер:
  */

  class Burger
  {
      protected $size;

      protected $cheese = false;
      protected $pepperoni = false;
      protected $lettuce = false;
      protected $tomato = false;

      public function __construct(BurgerBuilder $builder)
      {
          $this->size = $builder->size;
          $this->cheese = $builder->cheese;
          $this->pepperoni = $builder->pepperoni;
          $this->lettuce = $builder->lettuce;
          $this->tomato = $builder->tomato;
      }
  }

/**
 * Применяем конструирование:
 */

 class BurgerBuilder
{
    public $size;

    public $cheese = false;
    public $pepperoni = false;
    public $lettuce = false;
    public $tomato = false;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function addPepperoni()
    {
        $this->pepperoni = true;
        return $this;
    }

    public function addLettuce()
    {
        $this->lettuce = true;
        return $this;
    }

    public function addCheese()
    {
        $this->cheese = true;
        return $this;
    }

    public function addTomato()
    {
        $this->tomato = true;
        return $this;
    }

    public function build(): Burger
    {
        return new Burger($this);
    }
}

/**
* Используем:
*/

$burger = (new BurgerBuilder(14))
                  ->addPepperoni()
                  ->addLettuce()
                  ->addTomato()
                  ->build();
