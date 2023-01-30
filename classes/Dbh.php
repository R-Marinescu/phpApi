<?php 

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "phptest";



    protected function connect() {
        $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function ping() {
        try {
           $stmt = $this->connect()->query('SELECT 1 FROM users');
           $result = $stmt->fetch();
           $response['ping'] = json_encode($result , JSON_PRETTY_PRINT);
        } catch (PDOException $e) {
            $this->connect();
        }
        echo json_encode($response['ping'] . "conn");
        echo "<br>";
        return true;
    }

    // $this->connect()->query('SELECT 1');
    //$stmt = $this->connect()->query('SELECT * FROM users WHERE user_id = 1');
}