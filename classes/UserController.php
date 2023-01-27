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

    // public function processRequest(string $method, ?string $id): void {
    //     if ($id) {

    //         $this->processResourceRequest($method, $id);

    //     } else {

    //         $this->processCollectionRequest($method);
    //     }
        
    // }

    // private function processResourceRequest(string $method, string $id): void {

        
    // }

    // private function processCollectionRequest(string $method) {

    //     switch($method) {
    //         case "GET":
    //             $this->getAllUsers();
    //             break;
    //     }
        
    // }
    
    
    
}