<?php
/**
 * The Architect is just calling a bunch of executions to the builder. The builder takes these executions
 * and tweaks the final product: the House. You could have made the Carpenter responsible for this but he
 * already has enough on his plate building houses without having to worry about my specific old house from
 * the suburbs.
 */
namespace App;
/**
 *
 */
class Architect
{
public function createMyOldHouse(Carpenter $builder)
{
  // house foundation
  $builder->outside(25, 13);
  // master bedroom
  $builder->sidewall(5, range(1, 9));
  $builder->wall(range(1, 5), 10);
  $builder->wall(range(2, 5), 5);
  $builder->door(5, 4, 'left bottom');
  $builder->door(1, 5, 'left bottom');
  $builder->door(5, 9, 'left bottom');
// bathrooms
  $builder->sidewall(2, range(6, 9));
// bedroom 2
  $builder->wall(range(8, 11), 10);
  $builder->wall(8, 7);
  $builder->wall(range(8, 11), 5);
//
//
// lots of code omitted here for brevity
//
//
  $builder->label(8, 21, ' K');
  $builder->label(11, 22, ' U');
}
}
