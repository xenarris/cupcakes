<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once("vendor/autoload.php");
require_once("data-layer.php");
require_once("validation.php");

$f3 = Base :: instance();

$f3 -> route('GET|POST /', function ($f3){
    //initialize variables
    $f3->set('flavors', getFlavors());
    $f3->set('name', "");

    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
        //var_dump($_POST);

        if (validName($_POST['name'])) { //if name is valid
            $f3->set('name', $_POST['name']); //save post name to f3
        } else {
            $f3->set('errors[name]', 'Name cannot be empty');
        }

        if (!empty($_POST['flavors'])) { //if flavors array is not empty, reroute
            header('location: summary');
        }
        //if flavors array is empty
        $f3->set('errors[flavs]', 'Please select a cupcake flavor');
    }

    $view = new Template();
    echo $view -> render("views/home.html");
});

//Run fat free
$f3->run();