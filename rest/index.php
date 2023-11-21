<?php

require "../vendor/autoload.php";
require "./services/MidtermService.php";

Flight::register('midtermService', 'MidtermService');

/*Flight::route('/', function () {
    //echo 'hello world!';
   new MidtermDao();

});
*/



require 'routes/MidtermRoutes.php';

Flight::start();
 ?>
