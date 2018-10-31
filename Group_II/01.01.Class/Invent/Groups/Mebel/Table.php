<?php
namespace Invent\Groups\Mebel;
use Invent\Groups\Mebel;

class Table extends Mebel {
  function __construct (){
    echo "<p>
    Создали столик
    </p>";
    parent::__construct(); // Вызов конструктора предка
  }
}
