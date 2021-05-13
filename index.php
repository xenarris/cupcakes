<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once("vendor/autoload.php");

$f3 = Base :: instance();

$f3 -> route('GET /', function (){
    $view = new Template();
    echo $view -> render("views/home.html");


});

//Run fat free
$f3->run();