<?php
/**
 * The NoviceCarpenter implements your abstract methods and uses specific types of material, the | and
 * – characters. The ExpertCarpenter builds things with the sturdier = and ) characters because he is more
 * experienced.
 */
namespace App;
class NoviceCarpenter
{
public function wall($rows, $columns, $wallType = 'left side')
{
$this->items($rows, $columns, $this->wallChar($wallType));
}
public function sidewall($rows, $columns)
{
$this->items($rows, $columns, '--');
}
public function door($rows, $columns, $doorType = 'left entry')
{
$this->items($rows, $columns, $this->doorChar($doorType));
}
public function blank($rows, $columns)
{
$this->items($rows, $columns, ' ');
}
public function label($rows, $columns, $label)
{
$this->items($rows, $columns, $label);
}
public function topOutsideWall($width, $height)
{
$this->items(0, range(0, $width - 1), '--');
}
public function leftOutsideWall($width, $height)
{
$this->items(range(1, $height - 1), 0, '| ');
}
public function rightOutsideWall($width, $height)
{
$this->items(range(1, $height - 1), $width - 1, ' |');
}
public function bottomOutsideWall($width, $height)
{
$this->items($height - 1, range(0, $width - 1), '--');
$this->items($height - 1, 0, '|-');
}
protected function wallChar($wallType)
{
// returns the correct wall character for this type
}
protected function doorChar($doorType)
{
// returns the correct door character for this type
}
}
