<?php
/**
 * Представьте, что у вас есть несколько фото, которые хранятся на карте памяти.
 * Вам нужно перенести их на компьютер, а чтобы это сделать, необходим адаптер,
 * совместимый и с картой, и с портами ПК. Именно такую функцию выполняет паттерн Adapter:
 * обеспечивает взаимосвязь классов и несовместимых интерфейсов.
 */

 /**
  * В качестве другого примера рассмотрим игру, в которой есть охотник и львы.
  * Для начала нам потребуется интерфейс Lion:
  */

  interface Lion
{
    public function roar();
}

class AfricanLion implements Lion
{
    public function roar()
    {
    }
}

class AsianLion implements Lion
{
    public function roar()
    {
    }
}

/**
 * И есть охотник, который ожидает реализации интерфейса Lion для охоты:
 */

 class Hunter
{
    public function hunt(Lion $lion)
    {
    }
}

/**
 * Теперь добавим в игру класс WildDog, на который охотник тоже должен охотиться.
 * Вот только это нельзя сделать напрямую, так как у динго другой интерфейс.
 * Чтобы сделать класс совместимым с классом охотника, нужен адаптер:
 */

class WildDog
{
    public function bark()
    {
    }
}

// Создадим адаптер
class WildDogAdapter implements Lion
{
    protected $dog;

    public function __construct(WildDog $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}

/**
 * Используем:
 */

$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);
