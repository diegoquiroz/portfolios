<?php
// Author: Diego Quiroz

namespace App\Models;

class MessageController {

    public function __construct($connection) {
    	$this->connection = $connection;
    }

    public function insert(array $data) {

		$statement = "insert into messages (name, email, message)
					  values (:name, :email, :message)";
		try {
			$query = $this->connection->prepare($statement);
			$query->execute(array(
				'name' => $data['name'],
				'email' => $data['email'],
				'message' => $data['message']
			));
			return $query->rowCount;
		} catch (\PDOException $ex) {
			exit($ex->getMessage());
		}
	}

}
