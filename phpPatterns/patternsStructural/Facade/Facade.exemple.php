<?php
/**
 * Как включить компьютер? Все мы привыкли, что для этого достаточно нажать одну кнопку,
 * и никто не задумывается, что при этом происходит на самом деле.
 * Как и простое включение компьютера, Facade паттерн позволяет использовать максимально
 * простой интерфейс для доступа к библиотеке, системе классов или фреймворку.
 */

 /**
  * Итак, у нас есть класс «Computer»
  */

  class Computer
{
    public function getElectricShock()
    {
        echo "Ouch!";
    }

    public function makeSound()
    {
        echo "Beep beep!";
    }

    public function showLoadingScreen()
    {
        echo "Loading..";
    }

    public function bam()
    {
        echo "Ready to be used!";
    }

    public function closeEverything()
    {
        echo "Bup bup bup buzzzz!";
    }

    public function sooth()
    {
        echo "Zzzzz";
    }

    public function pullCurrent()
    {
        echo "Haaah!";
    }
}

/**
  * А здесь расположен фасад:
  */

  class ComputerFacade
  {
      protected $computer;

      public function __construct(Computer $computer)
      {
          $this->computer = $computer;
      }

      public function turnOn()
      {
          $this->computer->getElectricShock();
          $this->computer->makeSound();
          $this->computer->showLoadingScreen();
          $this->computer->bam();
      }

      public function turnOff()
      {
          $this->computer->closeEverything();
          $this->computer->pullCurrent();
          $this->computer->sooth();
      }
  }

/**
  * Теперь мы можем использовать фасад:
  */

$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ouch! Beep beep! Loading.. Ready to be used!
$computer->turnOff(); // Bup bup buzzz! Haah! Zzzzz
