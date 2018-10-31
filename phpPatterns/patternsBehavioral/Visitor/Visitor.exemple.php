<?php
/**
 * Предположим, вы решили посетить Дубай. Для этого понадобится только виза.
 * По прибытии вы можете посетить любое место города самостоятельно,
 * без необходимости получать дополнительные разрешения.
 * Просто узнайте о нужном месте и посетите его. Поведенческие паттерны Посетитель как раз и отвечают
 * за добавление таких мест, которые можно посещать без дополнительных утруждающих действий.
 */

 /**
  * В качестве примера для кода возьмем зоопарк, где есть разные животные. Зададим интерфейс:
  */

  interface Animal
{
    public function accept(AnimalOperation $operation);
}

interface AnimalOperation
{
    public function visitMonkey(Monkey $monkey);
    public function visitLion(Lion $lion);
    public function visitDolphin(Dolphin $dolphin);
}

/**
 * Работаем с разными видами животных:
 */

 class Monkey implements Animal
{
    public function shout()
    {
        echo 'Ooh oo aa aa!'.'<br>';
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitMonkey($this);
    }
}

class Lion implements Animal
{
    public function roar()
    {
        echo 'Roaaar!'.'<br>';
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitLion($this);
    }
}

class Dolphin implements Animal
{
    public function speak()
    {
        echo 'Tuut tuttu tuutt!'.'<br>';
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitDolphin($this);
    }
}

/**
 * Реализуем посетителя:
 */

 class Speak implements AnimalOperation
{
    public function visitMonkey(Monkey $monkey)
    {
        $monkey->shout();
    }

    public function visitLion(Lion $lion)
    {
        $lion->roar();
    }

    public function visitDolphin(Dolphin $dolphin)
    {
        $dolphin->speak();
    }
}

/**
 * Используем:
 */

$monkey = new Monkey();
$lion = new Lion();
$dolphin = new Dolphin();

$speak = new Speak();

$monkey->accept($speak);    // Ooh oo aa aa!
$lion->accept($speak);      // Roaaar!
$dolphin->accept($speak);   // Tuut tutt tuutt!
