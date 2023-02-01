<?php


class UserController {


  //Get All from Users 
  public function getAllUsers() {
  }

  // Get one user by name 
  public function getUserByName() {
    $result = UserRepo::getInstance()->getUserByName($_GET['name']);
    return $result;
  }

  //get user by id
  public function getUserById() {
    $result = UserRepo::getInstance()->getUserById($_GET['id']);
    
    return $result;
  }

  //update user
  public function updateUser() {
    $result = UserRepo::getInstance()->updateUser($_GET['id'], $_GET['firstName'], $_GET['lastName'], $_GET['dateOfBirth'], $_GET['email']);

    return $result;
  }

  //delete user
  public function deleteUserById() {
    $result = UserRepo::getInstance()->deleteUserById($_GET['id']);
    //$response['deleteUser'] = json_encode($id . "th/st user has been deleted");

    return $result;
  }

  //insert user into db
  public function insertUser() {
    $result = UserRepo::getInstance()->insertUser($_GET['firstName'] ?? "User", $_GET['lastName'] ?? "UserLastname", $_GET['dateOfBirth'] ?? "1/1/2023", $_GET['email'] ?? "exam@exam.com");

    return $result;
  }

  public function msgDefault()  {
    $msg = ['error' => '404', 'message' => "Methods available: getall, adduser, getbyid, getbyname, updateuser, deleteuser"];
    http_response_code(404);
    return $msg;
  }

  

  public function crudActions() {
    switch (strtolower($_GET['action'])) {
      case 'getall':
        return UserRepo::getInstance()->getAll();
        break;
      case 'adduser':
        return self::insertUser();
        break;
      case 'getbyid':
        return self::getUserById();
        break;
      case 'getbyname':
        return self::getUserByName();
        break;
      case 'updateuser':
        return self::updateUser();
        break;
      case 'deleteuser':
        return self::deleteUserById();
        break;

      default:
        return self::msgDefault();
    }
  }
  
 

  public function response($response) {
    
    $msg = json_encode($response, JSON_PRETTY_PRINT);
    return $msg;
  }

  
}

