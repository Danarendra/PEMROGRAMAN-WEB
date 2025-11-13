<?php

class Database {
    private $host = "localhost";
    private $port = "5432";
    private $db_name = "company_db";
    private $username = "postgres";
    private $password = "danar160206";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $exception) {
            echo "Error koneksi database: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}
?>