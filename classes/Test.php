<?php

class Test extends Dbh{

    //gets all columns from all the users
    public function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()) {
            echo " Name: " . $row['firstName'] . " last Name: " . $row['lastName'] . " date of birth: " .  $row['dateOfBirth'] . " email: " . $row['email'] . '<br>';
        }
    }


    //Gets all 1 column for all users
    public function getUsersStmt1() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        $names = $stmt->fetchAll();

        foreach ($names as $name) {
            echo $name['email'] . '<br>';
        }
    }

    //Get user column 
    // public function getUsersStmt($firstName, $lastName) {
    //     $sql = "SELECT * FROM users WHERE firstName = ? AND lastName =?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$firstName, $lastName]);
    //     $names = $stmt->fetchAll();

    //     foreach ($names as $name) {
    //         echo $name['dateOfBirth'] . '<br>';
    //     }
    // }

    
    //Inserts user to db
    public function setUserStmt($firstName, $lastName, $dateOfBirth, $email) {
        $sql = "INSERT INTO users(firstName, lastName, dateOfBirth, email) VALUES (?, ?, ?, ?)";
        $stmt =$this->connect()->prepare($sql);
        $stmt->execute([$firstName, $lastName, $dateOfBirth, $email]);

    }






    //Get row/rows by name AND lastName from users
    public function getUsersStmt($firstName, $lastName): array {
        $sql = "SELECT * FROM users WHERE firstName = ? AND lastName =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstName, $lastName]);
        
        $names = $stmt->fetchAll();

         $data = [];

        foreach ($names as $name) {
            $data[] = $name;
        }
        return $data;
    }



    //Get All from users
    public function getAll(): array {

        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);

        $data = [];

        while ($row = $stmt->fetch()) {
            $data[] = $row;
        }

        return $data;
    }


}