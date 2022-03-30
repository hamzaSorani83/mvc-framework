<?php

session_start();

define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/Model.php';
require_once ROOT_PATH . 'model/Page.php';


// connect
$dsn = "mysql:dbname=build_cms;charset=UTF8;host=127.0.0.1";
$user = 'root';
$password = '';
try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'index';

if ($section == 'about') {
    include  ROOT_PATH . 'controller/AboutUsPageController.php';
    $AboutUsPageController = new AboutUsPageController();
    $AboutUsPageController->runAction($action);
} else if ($section == 'contact') {
    include ROOT_PATH . 'controller/ContactController.php';
    $ContactController = new ContactController();
    $ContactController->runAction($action);
} else {
    include ROOT_PATH . 'controller/HomePageController.php';
    $HomePageController = new HomePageController();
    $HomePageController->runAction($action);
}
