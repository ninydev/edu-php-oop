<?php
/**
 * Вы когда-нибудь заказывали чай в кафе? Они зачастую делают больше одной чашки,
 * приносят вам ваш чай, а остальное сохраняют для других клиентов.
 * Структурные паттерны Flyweight как раз этим и занимаются, чем экономят память.
 */

 /**
  * У нас есть чай и тот, кто его готовит:
  */

  class KarakTea
{
}

// Работает как производитель и сохраняет чай
class TeaMaker
{
    protected $availableTea = [];

    public function make($preference)
    {
        if (empty($this->availableTea[$preference])) {
            $this->availableTea[$preference] = new KarakTea();
        }

        return $this->availableTea[$preference];
    }
}

/**
  * Также есть кафе, где принимаются и выполняются заказы:
  */

  class TeaShop
  {
      protected $orders;
      protected $teaMaker;

      public function __construct(TeaMaker $teaMaker)
      {
          $this->teaMaker = $teaMaker;
      }

      public function takeOrder(string $teaType, int $table)
      {
          $this->orders[$table] = $this->teaMaker->make($teaType);
      }

      public function serve()
      {
          foreach ($this->orders as $table => $tea) {
              echo "Принести чай, столик# " . $table .'<br>';
          }
      }
  }

/**
  * Используем:
  */

$teaMaker = new TeaMaker();
$shop = new TeaShop($teaMaker);

$shop->takeOrder('меньше сахара', 1);
$shop->takeOrder('больше молока', 2);
$shop->takeOrder('без сахара', 5);

$shop->serve();
