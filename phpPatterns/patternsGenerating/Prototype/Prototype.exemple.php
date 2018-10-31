<?php
/**
 * Помните Долли? Овцу, которую клонировали. Порождающие паттерны «Прототип» — это именно о клонировании.
 */

 /**
  * В PHP это легко реализовать, используя clone:
  */

  class Sheep
  {
      protected $name;
      protected $category;

      public function __construct(string $name, string $category = ' Горная овца'.'<br>')
      {
          $this->name = $name;
          $this->category = $category;
      }

      public function setName(string $name)
      {
          $this->name = $name;
      }

      public function getName()
      {
          return $this->name;
      }

      public function setCategory(string $category)
      {
          $this->category = $category;
      }

      public function getCategory()
      {
          return $this->category;
      }
  }

/**
 * После можно приступать к клонированию, как показано ниже:
 */

$original = new Sheep('Джолли');
echo $original->getName(); // Джолли
echo $original->getCategory(); // Горная овца

// Clone and modify what is required
$cloned = clone $original;
$cloned->setName('Долли');
echo $cloned->getName(); // Долли
echo $cloned->getCategory(); // Горная овца
