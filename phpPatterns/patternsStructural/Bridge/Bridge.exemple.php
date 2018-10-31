<?php
/**
 * Есть сайт с разными страницами, и пользователь должен иметь возможность изменять тему.
 * Что делать? Можно создать копии страниц для каждой из тем или же просто загрузить темы отдельно.
 * Структурные паттерны Bridge позволят реализовать второй вариант.
 * Шаблон отвечает за разделение одного или нескольких классов на 2 иерархии, которые включают в себя
 * абстракцию и реализацию. Это позволяет работать с иерархиями независимо друг от друга.
 */

 /**
  * Наш пример в виде кода, в котором представлена иерархия WebPage:
  */

  interface WebPage
{
    public function __construct(Theme $theme);
    public function getContent();
}

class About implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return "Страница About page в теме " . $this->theme->getColor();
    }
}

class Careers implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return "Страница Careers page в теме " . $this->theme->getColor();
    }
}

  /**
   * И отдельная иерархия тем:
   */

   interface Theme
{
    public function getColor();
}

class DarkTheme implements Theme
{
    public function getColor()
    {
        return 'Dark Black';
    }
}
class LightTheme implements Theme
{
    public function getColor()
    {
        return 'Off white';
    }
}
class AquaTheme implements Theme
{
    public function getColor()
    {
        return 'Light blue';
    }
}

/**
 * Реализовываем их:
 */

$darkTheme = new DarkTheme();

$about = new About($darkTheme);
$careers = new Careers($darkTheme);

echo $about->getContent().'<br>'; // "Страница "About page" в теме "Dark Black"";
echo $careers->getContent().'<br>'; // "Страница "Careers page" в теме "Dark Black"";
