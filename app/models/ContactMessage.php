<?php
// Author: Diego Quiroz

class ContactMessage {
    
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function create($form) {
        $statement = "insert into messages name=$form";
        try {
            $query = $this->connection->query($statement);
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $ex) {
            exit($ex->getMessage());
        }
    }

    public function delete() {
    }
}
