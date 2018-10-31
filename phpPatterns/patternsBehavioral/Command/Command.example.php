<?php
/**
 * Заказ еды в ресторане: вы (Client) попросите официанта (Invoker) принести еду (Command), а официант отправит этот запрос шеф-повару (Receiver).
 * Другой пример для паттерна Command: вы (Client) включаете (Command) телевизор (Receiver) с помощью пульта (Invoker).
 *
 */

 /**
  * Receiver
  * Прежде всего, у нас есть получатель (Receiver), который выполняет определенные действия:
  */
 class Bulb
 {
     public function turnOn()
     {
         echo 'Лампа светится'.'<br>';
     }

     public function turnOff()
     {
         echo 'Тьма'.'<br>';
     }
 }
/**
 * Есть интерфейс реализации команд и набор команд:
 */
 interface Command
{
    public function execute();
    public function undo();
    public function redo();
}

// Command
class TurnOn implements Command
{
    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOn();
    }

    public function undo()
    {
        $this->bulb->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}

class TurnOff implements Command
{
    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOff();
    }

    public function undo()
    {
        $this->bulb->turnOn();
    }

    public function redo()
    {
        $this->execute();
    }
}

/**
 * Invoker
 * Также должен быть посредник (Invoker), с которым взаимодействует клиент:
 */
class RemoteControl
{
    public function submit(Command $command)
    {
        $command->execute();
    }
}


/**
 * А теперь смотрим, как это работает
 */

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn); // Лампа светится
$remote->submit($turnOff); // Тьма
