<?php
/**
 * Рассмотрим пример сортировки пузырьком. Когда данных становится слишком много,
 * такой вид сортировки становится очень медленным. Чтобы решить проблему,
 * мы применим быструю сортировку. Но хоть этот алгоритм и обрабатывает большие объемы быстро,
 * в небольших он медленный. Поведенческие паттерны Strategy позволяют реализовать стратегию,
 * в которой совмещены оба метода.
 */

 /**
  * Имеем интерфейс и различные варианты реализации стратегии:
  */

  interface SortStrategy
{
    public function sort(array $dataset): array;
}

class BubbleSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo 'Сортировка пузырьком'.'<br>';

        // Сортируем
        return $dataset;
    }
}

class QuickSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo 'Быстрая сортировка'.'<br>';

        // Сортируем
        return $dataset;
    }
}

/**
 * Теперь есть клиент, выбирающий один из вариантов:
 */

 class Sorter
{
    protected $sorter;

    public function __construct(SortStrategy $sorter)
    {
        $this->sorter = $sorter;
    }

    public function sort(array $dataset): array
    {
        return $this->sorter->sort($dataset);
    }
}

/**
 * Используем:
 */
 
$dataset = [1, 5, 4, 3, 2, 8];

$sorter = new Sorter(new BubbleSortStrategy());
$sorter->sort($dataset); // Вывод : Сортировка пузырьком

$sorter = new Sorter(new QuickSortStrategy());
$sorter->sort($dataset); // Вывод : Быстрая сортировка
