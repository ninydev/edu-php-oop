<?php
/**
 * Предположим, вы хотите оплатить покупку в Интернете. Всего есть 3 способа оплаты: A, B и C.
 * Каждый из них располагает суммами в $100, $300 и $1000 соответственно, а приоритетность способов снижается от A к C.
 * Вы хотите приобрести товар стоимость $210. Сперва будет проверен баланс A.
 * Если нет достаточной суммы, запрос перемещается к балансу B, и так далее, пока не будет найдена необходимая сумма.
 * Именно так работают поведенческие паттерны Цепочка Обязанностей, где A, B и C – звенья.
 */


abstract class Account
{
    protected $successor;
    protected $balance;

    public function setNext(Account $account)
    {
        $this->successor = $account;
    }

    public function pay(float $amountToPay)
    {
        if ($this->canPay($amountToPay)) {
            echo sprintf('Оплачено %s с использованием %s' . PHP_EOL, $amountToPay, get_called_class()).'<br>';
        } elseif ($this->successor) {
            echo sprintf('Нельзя оплатить с использованием %s. В процессе ..' . PHP_EOL, get_called_class()).'<br>';
            $this->successor->pay($amountToPay);
        } else {
            throw new Exception('Ни на одном из аккаунтов нет необходимых средств');
        }
    }

    public function canPay($amount): bool
    {
        return $this->balance >= $amount;
    }
}

class Bank extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

class Paypal extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

class Bitcoin extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

/**
*
*/


$bank = new Bank(100);          // Банковский счет 100
$paypal = new Paypal(200);      // Paypal 200
$bitcoin = new Bitcoin(300);    // Bitcoin 300

$bank->setNext($paypal);
$paypal->setNext($bitcoin);

// Попробуем оплатить с помощью приоритетного банковского счета
$bank->pay(259);

// Выдаст:
// ==============
// Нельзя оплатить с использованием bank. В процессе ..
// Нельзя оплатить с использованием paypal. В процессе ..
// Оплачено 259 с использованием Bitcoin
