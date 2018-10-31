<?php
/**
 *Хорошим примером станет старый радиоприемник, в котором можно переключаться на
 *следующий и предыдущий каналы с помощью соответствующих кнопок. Нечто подобное можно
 *проделать с телевизором, MP3-плеером и прочими устройствами. Именно поведенческие
 *паттерны Iterator позволяют обходить элементы объекта последовательно.
 */

 /**
  * С PHP это легко реализовать, используя SPL (Standard PHP Library). Разберем пример.
  * Изначально у нас есть радиостанция:
  */
  
  class RadioStation
  {
      protected $frequency;

      public function __construct(float $frequency)
      {
          $this->frequency = $frequency;
      }

      public function getFrequency(): float
      {
          return $this->frequency;
      }
  }

  /**
   * Далее вводим итератор:
   */

use Countable;
use Iterator;

class StationList implements Countable, Iterator
{
    /** @var RadioStation[] $stations */
    protected $stations = [];

    /** @var int $counter */
    protected $counter;

    public function addStation(RadioStation $station)
    {
        $this->stations[] = $station;
    }

    public function removeStation(RadioStation $toRemove)
    {
        $toRemoveFrequency = $toRemove->getFrequency();
        $this->stations = array_filter($this->stations, function (RadioStation $station) use ($toRemoveFrequency) {
            return $station->getFrequency() !== $toRemoveFrequency;
        });
    }

    public function count(): int
    {
        return count($this->stations);
    }

    public function current(): RadioStation
    {
        return $this->stations[$this->counter];
    }

    public function key()
    {
        return $this->counter;
    }

    public function next()
    {
        $this->counter++;
    }

    public function rewind()
    {
        $this->counter = 0;
    }

    public function valid(): bool
    {
        return isset($this->stations[$this->counter]);
    }
}

/**
 * Реализовываем:
 */

 $stationList = new StationList();

$stationList->addStation(new RadioStation(89));
$stationList->addStation(new RadioStation(101));
$stationList->addStation(new RadioStation(102));
$stationList->addStation(new RadioStation(103.2));

foreach($stationList as $station) {
    echo $station->getFrequency() . PHP_EOL;
}

$stationList->removeStation(new RadioStation(89)); // Возвращает станцию 89
