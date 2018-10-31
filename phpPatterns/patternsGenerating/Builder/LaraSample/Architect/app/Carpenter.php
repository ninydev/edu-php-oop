<?php
/**
 * The Carpenter is taking on the role of the builder. In this application, you have two types of
 * Carpenters, though, who behave differently, namely the Novice and the Expert. These carpenters will
 * produce a different house using the same set of instructions given by the director (your Architect). It would
 * be super easy to add more builders (e.g. DrunkenCarpenter) to your application later if you needed. Let’s
 * look at NoviceCarpenter.
 */

namespace App;


class Carpenter
{
protected $house;
public function __construct(House $house = null)
{
$this->house = $house ?: new House;
}

public function getHouse()
{
return $this->house;
}

public function outside($width, $height)
{
$this->house->layout = array_fill(0, $height, array_fill(0, $width, " "));
//$this->topOutsideWall($width, $height);
//$this->leftOutsideWall($width, $height);
//$this->rightOutsideWall($width, $height);
//$this->bottomOutsideWall($width, $height);
}
/*
abstract public function wall($rows, $columns, $wallType = 'left side');
abstract public function sidewall($rows, $columns);
abstract public function door($rows, $columns, $doorType = 'left entry');
abstract public function blank($rows, $columns);
abstract public function label($rows, $columns, $label);
abstract public function topOutsideWall($width, $height);
abstract public function leftOutsideWall($width, $height);
abstract public function rightOutsideWall($width, $height);
abstract public function bottomOutsideWall($width, $height);
*/
protected function items($rows, $columns, $item)
{
// put the item where it needs to go inside the house
}
protected function assertInBounds($row, $column)
{
// make sure the requested row/column is inside of the house
}
}
