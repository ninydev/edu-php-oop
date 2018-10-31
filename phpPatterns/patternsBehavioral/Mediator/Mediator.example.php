<?php
/**
 * Когда вы разговариваете с кем-то по телефону, это никогда не происходит напрямую.
 * Между вами и собеседником находится провайдер, и в этом случае поставщик мобильных услуг является посредником.
 */

 /**
  * Рассмотрим на примере чата, где и будут использованы поведенческие паттерны Посредник. Есть окно чата:
  */

  interface ChatRoomMediator
  {
      public function showMessage(User $user, string $message);
  }

  // Посредник

class ChatRoom implements ChatRoomMediator
  {
      public function showMessage(User $user, string $message)
      {
          $time = date('M d, y H:i');
          $sender = $user->getName();

          echo $time . '[' . $sender . ']:' . $message.'<br>';
      }
  }

  /**
   * Добавляем к нему пользователей:
   */

class User
{
    protected $name;
    protected $chatMediator;

    public function __construct(string $name, ChatRoomMediator $chatMediator) {
        $this->name = $name;
        $this->chatMediator = $chatMediator;
    }

    public function getName() {
        return $this->name;
    }

    public function send($message) {
        $this->chatMediator->showMessage($this, $message);
    }
}

/**
 * Реализовываем:
 */
 
$mediator = new ChatRoom();

$john = new User('Джон', $mediator);
$jane = new User('Джейн', $mediator);

$john->send('Здравствуй!');
$jane->send('Привет!');

// Output will be
// дата год время [Джон]: Здравствуй!
// дата год время [Джейн]: Привет!
