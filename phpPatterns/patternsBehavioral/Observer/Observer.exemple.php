<?php
/**
 * Люди, которые ищут работу, часто подписываются на сайты, где публикуются вакансии.
 * Именно эти сайты уведомляют соискателей о подходящих должностях,
 * и именно так работают поведенческие паттерны Observer.
 */

 /**
  * Есть соискатели:
  */

  class JobPost
{
    protected $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class JobSeeker implements Observer
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function onJobPosted(JobPost $job)
    {
        // Do something with the job posting
        echo 'Привет ' . $this->name . '! Размещена новая вакансия: '. $job->getTitle();
    }
}

/**
 * Добавляем вакансии, на которые можно подписываться:
 */

 class JobPostings implements Observable
{
    protected $observers = [];

    protected function notify(JobPost $jobPosting)
    {
        foreach ($this->observers as $observer) {
            $observer->onJobPosted($jobPosting);
        }
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function addJob(JobPost $jobPosting)
    {
        $this->notify($jobPosting);
    }
}

/**
 * Используем:
 */
 
$johnDoe = new JobSeeker('Джон');
$janeDoe = new JobSeeker('Джейн');

$jobPostings = new JobPostings();
$jobPostings->attach($johnDoe);
$jobPostings->attach($janeDoe);

$jobPostings->addJob(new JobPost('Разработчик ПО'));
