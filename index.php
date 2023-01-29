<?php
include './includes/autoloader.php';




$controller = new UserController;

echo $controller->crudActions();




//   $getUserById = strtolower($_GET['userid']);
//   echo $controller->getUserById($getUserById)['userId'];
//  $getAllUsers = strtolower($_GET['getusers']);
//  echo $controller->getAllUsers($getAllUsers)['users'];
//  $getUserByName = strtolower($_GET['getusername']);
//  echo $controller->getUserByName("Radu", $getUserByName)['user'];
//$_Get['insertuser'] = $controller->insertUser("Radu ", "Mar", "11/12/1999", "Radu@outlook.com")['insertUser'];
//echo $controller->insertUser("George", "Demian", "4/7/1999", "G@g")['insertUser'];
//echo $controller->getUserById(strtolower($_GET['userid']))['userId'];
//$createUser = $controller->insertUser("Stelios", "Pa", "23/5/2000", "S@gmail");
//echo $_POST[$controller->insertUser("Stelios", "Pa", "23/5/2000", "S@gmail")];
//echo $controller->getAllUsers($_GET[])['users'];
//echo $controller->updateUser(388, "Billiam", "Tyson", "28/8/1992", "B@outlook")['updateUser'];
//UserRepo::getInstance()->updateUser(70,"Mike", "Billson", "2/5/2000", "mike@gmail");
//echo $controller->insertUser("George", "Bean", "2/6/2006", "G@gmail")['insertUser'];



?>