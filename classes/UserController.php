<?php


class UserController extends UserRepo{


        //Get All from Users 
    public function getAllUsers() {
        $result = UserRepo::getInstance()->getAll();
        $response['users'] = json_encode($result, JSON_PRETTY_PRINT);
        
        return $response;
    }
    
    // Get one user by name 
    public function getUserByName($name) {
        $result = UserRepo::getInstance()->getUserByName($name);
        $response['user'] = json_encode($result, JSON_PRETTY_PRINT);

        return $response;
    }
        //get user by id
    public function getUserById($id) {
        $result = UserRepo::getInstance()->getUserById($id);
        $response['userId'] = json_encode($result, JSON_PRETTY_PRINT);

        return $response;
    }

        //insert user in to db
    public function insertUser($firstName, $lastName, $dateOfBirth, $email) {
        $result = UserRepo::getInstance()->insertUser($firstName, $lastName, $dateOfBirth, $email);
        $response['insertUser'] = json_encode("inserted user - name:" . $firstName  . " LastName:" . $lastName . " DOB:" . $dateOfBirth . " email:" . $email, JSON_PRETTY_PRINT);
        
        return $response;
    }

    //update user
    public function updateUser($id, $firstName, $lastName, $dateOfBirth, $email) {
        $result = UserRepo::getInstance()->updateUser($id, $firstName, $lastName, $dateOfBirth, $email);
        $response['updateUser'] = json_encode($id . "th/st  user details updated to: Name: " .$firstName . " LastName: " . $lastName . " DOB: " . $dateOfBirth . " email: " . $email, JSON_PRETTY_PRINT);

        return $response;
    }

    //delete user
    public function deleteUserById($id) {
        $result = UserRepo::getInstance()->deleteUserById($id);
        $response['deleteUser'] = json_encode($id . "th/st user has been deleted");

        return $response;
    }

    public function msgDefault() {
      $msg = json_encode('Methods available: getall, adduser, getbyid, getbyname, updateuser, deleteuser');
      return $msg;
    }


    public function crudActions() {

    switch (strtolower($_GET['action'])) {
      case 'getall':
        return self::getAllUsers(false)['users'];
        break;
      case 'adduser':
        return self::insertUser($_GET['firstName'] ?? "User", $_GET['lastName'] ?? "UserLastname", $_GET['dateOfBirth'] ?? "1/1/2023" , $_GET['email'] ?? "exam@exam.com")['insertUser'];
        break;
      case 'getbyid':
        return self::getUserById($_GET['id'])['userId'];
        break;
      case 'getbyname':
        return self::getUserByName($_GET['name'])['user'];
        break;
      case 'updateuser':
        return self::updateUser($_GET['id'] , $_GET['firstName'], $_GET['lastName'], $_GET['dateOfBirth'], $_GET['email'])['updateUser'];
        break;
      case 'deleteuser':
        return self::deleteUserById($_GET['id'])['deleteUser'];
        break;

      default:
        return self::msgDefault();
    }
  }
    
}