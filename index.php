<?php
include './includes/autoloader.php';
$controller = new UserController($_GET);
$controller->crudActions();
$controller->logger();
echo $controller->response();
