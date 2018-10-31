<?php
/**
 * Допустим, вы используете приложение для рисования, где выбираете кисть.
 * Теперь кисть меняет свое состояние в соответствии с выбранным цветом.
 * То есть, если вы выбрали красный цвет, то и кисть будет рисовать красным.
 */

 /**
  * Для кода используем пример с текстовым редактором, в котором можно изменить шрифт.
  * У нас есть интерфейс и реализация некоторых состояний:
  */

  interface WritingState
{
    public function write(string $words);
}

class UpperCase implements WritingState
{
    public function write(string $words)
    {
        echo strtoupper($words);
    }
}

class LowerCase implements WritingState
{
    public function write(string $words)
    {
        echo strtolower($words);
    }
}

class Default implements WritingState
{
    public function write (string $words)
    {
        echo $words;
    }
}

/**
 * Добавляем редактор:
 */

 class TextEditor
{
    protected $state;

    public function __construct(WritingState $state)
    {
        $this->state = $state;
    }

    public function setState(WritingState $state)
    {
        $this->state = $state;
    }

    public function type(string $words)
    {
        $this->state->write($words);
    }
}

/**
 * Реализовываем:
 */

 $editor = new TextEditor(new Default());

$editor->type('Первая строка');

$editor->setState(new UpperCase());

$editor->type('Вторая строка');
$editor->type('Третья строка');

$editor->setState(new LowerCase());

$editor->type('Четвертая строка');
$editor->type('Пятая строка');

// Вывод:
// Первая строка
// ВТОРАЯ СТРОКА
// ТРЕТЬЯ СТРОКА
// четвертая строка
// пятая строка
