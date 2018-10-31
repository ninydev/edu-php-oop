<?php
/**
 * Но порождающие паттерны на этом не заканчиваются. Шаблон проектирования Factory Method
 * работает с полиморфизмом. В главном классе задается интерфейс, а реализация определяется уже подклассами.
 */

 /**
  * Допустим, у нас есть интерфейс соискателя:
  */

  interface Interviewer
{
    public function askQuestions();
}

class Developer implements Interviewer
{
    public function askQuestions()
    {
        echo 'Спросить о шаблонах проектирования'.'<br>';
    }
}

class CommunityExecutive implements Interviewer
{
    public function askQuestions()
    {
        echo 'Спросить об общественном строительстве'.'<br>';
    }
}

/**
 * Теперь создаем менеджера по подбору персонала:
 */

 abstract class HiringManager
 {

     // Factory method
     abstract public function makeInterviewer(): Interviewer;

     public function takeInterview()
     {
         $interviewer = $this->makeInterviewer();
         $interviewer->askQuestions();
     }
 }

 /**
  * Предоставляем необходимого соискателя:
  */

  class DevelopmentManager extends HiringManager
  {
      public function makeInterviewer(): Interviewer
      {
          return new Developer();
      }
  }

  class MarketingManager extends HiringManager
  {
      public function makeInterviewer(): Interviewer
      {
          return new CommunityExecutive();
      }
  }

  /**
   * После чего можно использовать:
   */

$devManager = new DevelopmentManager();
$devManager->takeInterview();

$marketingManager = new MarketingManager();
$marketingManager->takeInterview();
