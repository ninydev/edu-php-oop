<?php
namespace Invent;

class BaseCabinet
// abstract - запретит создавать экземпляр класса
{
  public function __construct (){
    echo "<p>Создан базовый класс - он загружает с базы важные данные</p>";

  }
  public $invNomer;
  public $nomerCabineta;
}
