<?php
/**
 * Строим дом. Этапы работы выглядят так:
 * -подготовка фундамента;
 * -строительство стен;
 * -добавление крыши;
 * -добавление необходимого количества этажей.
 * Порядок неизменен, но можно изменить каждый из этапов отдельно.
 * Например, стены могут быть из камня или из дерева.
 */

 /**
  * Предположим, есть инструмент для сборки, который позволяет тестировать программу, анализировать, генерировать отчеты и т. д.
  * Создадим базовый класс-скелет:
  */

  abstract class Builder
{

    // Шаблонный Метод
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}

/**
 * Теперь реализации:
 */

 class AndroidBuilder extends Builder
{
    public function test()
    {
        echo 'Старт Android тестов'.'<br>';
    }

    public function lint()
    {
        echo 'Анализ Android кода'.'<br>';
    }

    public function assemble()
    {
        echo 'Сборка Android'.'<br>';
    }

    public function deploy()
    {
        echo 'Развертывание Android'.'<br>';
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo 'Старт iOS тестов'.'<br>';
    }

    public function lint()
    {
        echo 'Анализ iOS кода'.'<br>';
    }

    public function assemble()
    {
        echo 'Сборка iOS'.'<br>';
    }

    public function deploy()
    {
        echo 'Развертывание iOS'.'<br>';
    }
}

/**
 * Используем:
 */
 
$androidBuilder = new AndroidBuilder();
$androidBuilder->build();

$iosBuilder = new IosBuilder();
$iosBuilder->build();
