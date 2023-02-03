<?php 

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $password = "jsd67FGa";
    private $dbName = "radu_db";
    private $pdo = null;


    public function connect() {
        try {
            
            if(is_null($this->pdo)) {
            $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbName;
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->pdo;
        } catch (PDOException $e) {
            echo json_encode("Connection failed: more info -> " . $e->getMessage());
        }
    }

    // public function connect() {
    //     if(is_null($this->pdo)) {
    //     $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbName;
    //     $this->pdo = new PDO($dsn, $this->user, $this->password);
    //     $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     }
    //     return $this->pdo;
    // }

 
    public function ping() {
        try {
           $stmt = $this->connect()->query('SELECT 1 FROM users');
           $result = $stmt->fetch();
           $response = json_encode($result , JSON_PRETTY_PRINT);
        } catch (PDOException $e) {
            $this->connect();
        }
        echo json_encode($response . "conn");
        echo "<br>";
        return true;
    }

   

}

