<?php
/**
 * Перехват критических ошибок
 *
 * @link http://php.net/manual/ru/function.register-shutdown-function.php
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 class shutdownScheduler
 {
     private $callbacks; // array to store user callbacks

     public function __construct()
     {
         $this->callbacks = array();
         register_shutdown_function(array($this, 'callRegisteredShutdown'));
     }
     public function registerShutdownEvent()
     {
         $callback = func_get_args();

         if (empty($callback)) {
             trigger_error('No callback passed to '.__FUNCTION__.' method', E_USER_ERROR);
             return false;
         }
         if (!is_callable($callback[0])) {
             trigger_error('Invalid callback passed to the '.__FUNCTION__.' method', E_USER_ERROR);
             return false;
         }
         $this->callbacks[] = $callback;
         return true;
     }
     public function callRegisteredShutdown()
     {
         foreach ($this->callbacks as $arguments) {
             $callback = array_shift($arguments);
             call_user_func_array($callback, $arguments);
         }
     }
     // test methods:
     public function dynamicTest()
     {
         echo '_REQUEST array is '.count($_REQUEST).' elements long.<br />';
     }
     public static function staticTest()
     {
         echo '_SERVER array is '.count($_SERVER).' elements long.<br />';
     }
 }
