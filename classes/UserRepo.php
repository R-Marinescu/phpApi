<?php

class UserRepo extends Dbh {

    private static $instance;
    private $redisInstance;


    //creates a static instance of the class
    public static function getInstance() {
        if(is_null( self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //Creates a Redis instance
    public function redisInstance() {
        if(is_null( $this->redisInstance)) {
            $this->redisInstance = new Redis();
            $this->redisInstance->connect('127.0.0.1', 6379);
        }
        return $this->redisInstance;
    }


    //Gets all users from Redis if saved othrwise from DB and saves them to Redis
    public function getAll(): array {

        $key = 'getAll';
        if(!self::redisInstance()->get($key)) {

        $sql = "SELECT * FROM users limit 5";
        $stmt = $this->connect()->query($sql);

        $data = [];

        while ($row = $stmt->fetch()) {
            $data[] = $row;
        }

        self::redisInstance()->set($key, serialize($data));
        self::redisInstance()->expire($key, 10);
    } else {
        $source = 'Redis server';
        $arr = unserialize(self::redisInstance()->get($key));
        array_unshift($arr, $source);
        $data[] = $arr;
    }
        //echo $source . ':<br>';
        //print_r($data);
        return  $data;
    }


    //Get user by name from Redis if not available pulls from Db and Saves to Redis
    public function getUserByName($name) {

        $key = 'getbyname';
        if(!self::redisInstance()->get($key)) {
        $sql = "SELECT * FROM users WHERE firstName = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);
        $results = $stmt->fetch();

        self::redisInstance()->set($key, serialize($results));
        self::redisInstance()->expire($key, 10);

    } else {
        $source = 'Redis server';
        $arr = unserialize(self::redisInstance()->get($key));
        array_unshift($arr, $source);
        
        $results = $arr;
    }

        return $results;
    }
    
    //Get user by Id
    public function getUserById($id) {
        $key = 'getbyid';
        if(!self::redisInstance()->get($key)) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetch();

        self::redisInstance()->set($key, serialize($results));
        self::redisInstance()->expire($key,10);
    } else {
        $source = 'Redis server';
        $arr = unserialize(self::redisInstance()->get($key));
		$arr2['source'] = $source;
        array_unshift($arr, $arr2);
		
        $results = array_merge($arr2,$arr);
    }

        return $results;
    }


 
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


   
}