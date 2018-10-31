<?php
/**
 * Когда вы делаете какой-либо рассчет с помощью калькулятора, последнее действие сохраняется в памяти устройства.
 * Это нужно для того, чтобы к этому действию можно было вернуться и,
 * возможно, восстановить, нажав на определенные кнопки.
 */

 /**
  * Поведенческие паттерны Memento можно рассмотреть и на примере текстового редактора,
  *который периодически делает сохранения. У нас есть объект, который сможет удерживать состояние редактора:
  */

  class EditorMemento
{
    protected $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}

/**
 * Появляется сам редактор:
 */

 class Editor
{
    protected $content = '';

    public function type(string $words)
    {
        $this->content = $this->content . ' ' . $words;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function save()
    {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento)
    {
        $this->content = $memento->getContent();
    }
}

/**
 * Используем:
 */
 
$editor = new Editor();

// Ввод
$editor->type('Это первое предложение.');
$editor->type('Это второе.');

// Сохраняем состояние для восстановления: Это первое предложение. Это второе.
$saved = $editor->save();

// Вводим еще
$editor->type('И это уже третье.');

// Вывод: содержание перед сохранением
echo $editor->getContent(); // Это первое предложение. Это второе. И это уже третье.

// Восстановление последнего сохраненного состояния
$editor->restore($saved);

$editor->getContent(); // Это первое предложение. Это второе.
