<?php
// Author: Diego Quiroz

namespace App\Models;

class ContentsController {

    public function __construct($connection) {
		$this->connection = $connection;
    }

    public function selectAll() {
		$statement = "select * from contents;";
		try {
			$query = $this->connection->query($statement);
			$result = $query->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
		} catch (\PDOException $ex) {
			exit($ex->getMessage());
		}
	}
}
