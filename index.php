<?php
include './includes/autoloader.php';




$controller = new UserController;




//  $getUserById = strtolower($_GET['userid']);
//  echo $controller->getUserById($getUserById)['userId'];

// $getAllUsers = strtolower($_GET['getusers']);
// echo $controller->getAllUsers($getAllUsers)['users'];

// $getUserByName = strtolower($_GET['getusername']);
// echo $controller->getUserByName("Radu", $getUserByName)['user'];

$controller->insertUser("Vasili", "papas", "4/7/1990", "Va@outlook.com")['insertUser'];













// class CrudController extends DBConnection
// {

//   static function crudActions()
//   {

//     switch (strtolower($_GET['action'])) {
//       case 'getall':
//         return self::getAll(false);

//         break;
//       case 'add':
//         self::Add($_GET['firstname'] ?? "User", $_GET['lastname'] ?? "UserLastname", $_GET['email'] ?? "exam@exam.com", $_GET['msisdn'] ?? "+37300000");
//         break;
//       case 'getbyid':
//         self::getById(false, $_GET['id']);
//         break;
//       case 'getbymsisdn':
//         self::getByMsisdn($_GET['msisdn']);
//         break;
//       case 'delete':
//         self::delete($_GET['id']);
//         break;
//       case 'update':
//         self::update($_GET['id'] ?? 'null', $_GET['firstname'] ?? 'null', $_GET['lastname'] ?? 'null', $_GET['email'] ?? 'null', $_GET['msisdn'] ?? 'null');
//         break;
//       case 'getmsisdn':
//         self::getMsisdn();
//         break;

//       default:
//         echo ' Available methods:getAll , Add , getById , getByMsisdn , delete , update .    Copy one of this methods  to URL! Have FUN!';
//         break;
//     }
//   }















//echo $controller->insertUser("George", "Demian", "4/7/1999", "G@g")['insertUser'];
//echo $controller->getUserById(strtolower($_GET['userid']))['userId'];

//$createUser = $controller->insertUser("Stelios", "Pa", "23/5/2000", "S@gmail");
//echo $_POST[$controller->insertUser("Stelios", "Pa", "23/5/2000", "S@gmail")];


//echo $controller->getAllUsers($_GET[])['users'];
//echo $controller->updateUser(388, "Billiam", "Tyson", "28/8/1992", "B@outlook")['updateUser'];
//UserRepo::getInstance()->updateUser(70,"Mike", "Billson", "2/5/2000", "mike@gmail");
//echo $controller->insertUser("George", "Bean", "2/6/2006", "G@gmail")['insertUser'];



?>