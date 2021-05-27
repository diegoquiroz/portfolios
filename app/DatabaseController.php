<?php
// Author: Diego Quiroz

namespace App;

class DatabaseController {

    private $connection;

    private $host;
    private $port;
    private $database;
    private $user;
    private $password;

    /*
    * An instance of this class will connect to our
    * database using data from .env
    */
    public function __construct() {
        //$this->host = getenv('DB_HOST');
        //$this->port = getenv('DB_PORT');
        //$this->database = getenv('DB_DATABASE');
        //$this->user = getenv('DB_USER');
        //$this->password = getenv('DB_PASSWORD');
        $this->host = 'mysql';
        $this->port = 3306;
        $this->database = 'project';
        $this->user = 'root';
        $this->password = 'root';
        
        $this->connection = new \PDO (
            "mysql:host=$this->host;port=$this->port;charset=utf8mb4;dbname=$this->database",
            $this->user,
            $this->password
        );
        
    }

    // Returns PDO connection
    public function getConnection() { return $this->connection; }

    // Returns host name of db
    public function getHost() { return $this->host; }
    // Returns port of mysql
    public function getPort() { return $this->port; }
    // Returns database name
    public function getDatabase() { return $this->database; }
    // Returns username of mysql
    public function getUser() { return $this->user; }
}
