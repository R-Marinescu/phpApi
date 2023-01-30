<?php

class UserRepo extends Dbh {

    private static $instance;


    public static function getInstance() {
        if(is_null( self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //Get All from users
    public function getAll(): array {
        $sql = "SELECT * FROM users limit 10";
        $stmt = $this->connect()->query($sql);

        $data = [];

        while ($row = $stmt->fetch()) {
            $data[] = $row;
        }

        return $data;
    }

    //Get user by name
    public function getUserByName($name) {
        $sql = "SELECT * FROM users WHERE firstName = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $results = $stmt->fetch();
        return $results;
    }

    //Get user by Id
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetch();
        return $results;
    }

    // //Inserts user to db
    // public function insertUser($firstName, $lastName, $dateOfBirth, $email) {
    //     $sql = "INSERT INTO users(firstName, lastName, dateOfBirth, email) VALUES (?, ?, ?, ?)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$firstName, $lastName, $dateOfBirth, $email]);
        
    //     return $stmt;
    // }
     //Inserts user to db
     public function insertUser($firstName, $lastName, $dateOfBirth, $email) {
        $sql = "INSERT INTO users(firstName, lastName, dateOfBirth, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstName, $lastName, $dateOfBirth, $email]);
        $result = "inserted user with name: " . $firstName . " lastName: " . $lastName . " dateOfBirth: " . $dateOfBirth . " email: " . $email;
        
        return $result;
    }

    //update user id
    public function updateUser($id, $firstName, $lastName, $dateOfBirth, $email) {
        $sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName',
        dateOfBirth = '$dateOfBirth', email = '$email' WHERE user_id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $id . "th/st user details updated to: Name: " .$firstName . " LastName: " . $lastName . " DOB: " . $dateOfBirth . " email: " . $email;

        return $result;
    }

    //delete user by id

    public function deleteUserById($id) {
        $sql = "DELETE FROM users WHERE user_id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $id . "th/st user has been deleted";

        return $result;
    }




//  //   update user
//     public function updateUser($id, Array $input) {
//         $sql = "UPDATE users SET
//             firstName = :firstName,
//             lastName = :lastName,
//             dateOfBirth = :dateOfBirth,
//             email = :email
//             WHERE user_id = :user_id";
//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute(array(
//             'user_id' => (int) $id,
//             'firstName' => $input['$firstName'],
//             'lastName' => $input['lastName'],
//             'dateOfBirth' => $input['dateOfBirth'],
//             'email' => $input['email'],
//         ));

//         return $stmt;
//     }


    // //Get row by name AND lastName from users
    // public function getUserByNameAndLastName($firstName, $lastName): array {
    //     $sql = "SELECT * FROM users WHERE firstName = ? AND lastName =? LIMIT 1";
    //     $stmt = $this->connect()->prepare($sql);
    //     $res = $stmt->execute([$firstName, $lastName]);
    //     $res = $res->fetchObj();
    //     $data = ["firstname" => $res->firstName];

       
    //     return $data;
    // }

   
}