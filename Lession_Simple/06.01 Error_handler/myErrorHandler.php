<?php
/**
 * Переключение обработчика ошибок
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */
 // функция обработки ошибок
 function myErrorHandler($errno, $errstr, $errfile, $errline)
 {
     if (!(error_reporting() & $errno)) {
         // Этот код ошибки не включен в error_reporting,
         // так что пусть обрабатываются стандартным обработчиком ошибок PHP
         return false;
     }

     switch ($errno) {
     case E_USER_ERROR:
         echo "<b>Пользовательская ОШИБКА</b> [$errno] $errstr<br />\n";
         echo "  Фатальная ошибка в строке $errline файла $errfile";
         echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
         echo "Завершение работы...<br />\n";
         exit(1);
         break;

     case E_USER_WARNING:
         echo "<b>Пользовательское ПРЕДУПРЕЖДЕНИЕ</b> [$errno] $errstr<br />\n";
         break;

     case E_USER_NOTICE:
         echo "<b>Пользовательское УВЕДОМЛЕНИЕ</b> [$errno] $errstr<br />\n";
         break;

     default:
         echo "Неизвестная ошибка: [$errno] $errstr<br />\n";
         break;
     }

     /* Не запускаем внутренний обработчик ошибок PHP */
     return true;
 }

 // функция для тестирования обработчика ошибок
 function scale_by_log($vect, $scale)
 {
     if (!is_numeric($scale) || $scale <= 0) {
         trigger_error("log(x) для x <= 0 не определен, вы используете: scale = $scale", E_USER_ERROR);
     }

     if (!is_array($vect)) {
         trigger_error("Некорректный входной вектор, пропущен массив значений", E_USER_WARNING);
         return null;
     }

     $temp = array();
     foreach ($vect as $pos => $value) {
         if (!is_numeric($value)) {
             trigger_error("Значение на позиции $pos не является числом, будет использован 0 (ноль)", E_USER_NOTICE);
             $value = 0;
         }
         $temp[$pos] = log($scale) * $value;
     }

     return $temp;
 }

 // переключаемся на пользовательский обработчик
 $old_error_handler = set_error_handler("myErrorHandler");

 // вызовем несколько ошибок, во-первых, определим массив с нечисловым элементом
 echo "vector a\n";
 $a = array(2, 3, "foo", 5.5, 43.3, 21.11);
 print_r($a);

 // теперь создадим еще один массив
 echo "----\nvector b - a notice (b = log(PI) * a)\n";
 /* Значение на позиции $pos не является числом, будет использован 0 (ноль)*/
 $b = scale_by_log($a, M_PI);
 print_r($b);

 // проблема, мы передаем строку вместо массива
 echo "----\nvector c - a warning\n";
 /* Некорректный входной вектор, пропущен массив значений */
 $c = scale_by_log("not array", 2.3);
 var_dump($c); // NULL

 // критическая ошибка, логарифм от неположительного числа не определен
 echo "----\nvector d - fatal error\n";
 /* log(x) для x <= 0 не определен, вы используете: scale = $scale */
 $d = scale_by_log($a, -2.5);
 var_dump($d); // До сюда не дойдем никогда
 
 restore_error_handler(); // Восстановление обработчика ошибок
