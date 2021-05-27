<?php
// Author: Diego Quiroz

namespace App;

class ArticleController {

    public function __construct($connection) {
		$this->connection = $connection;
    }

    public function selectAll() {
		$statement = "select * from articles;";
		try {
			$query = $this->connection->query($statement);
			$result = $query->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
		} catch (\PDOException $ex) {
			exit($ex->getMessage());
		}
	}

    public function insert(array $data) {
		$statement = "insert into articles (name, description, image)
					  values (:name, :description, :image)";
		try {
			$query = $this->connection->prepare($statement);
			$query->execute(array(
				'name' => $data['name'],
				'description' => $data['description'],
				'image' => $data['image']
			));
			return $query->rowCount;
		} catch (\PDOException $ex) {
			exit($ex->getMessage());
		}
	}

    public function edit(int $id, array $data) {
		if ($data['name'] === '' && $data['description'] === '' && $data['image'] === '') {
			$this->delete($id);
		}
		$statement = "UPDATE articles
					  SET name = :name, description = :description, image = :image
					  WHERE id = :id";
		try {
			$query = $this->connection->prepare($statement);
			$query->execute(array(
				'name' => $data['name'],
				'description' => $data['description'],
				'image' => $data['image'],
				'id' => $id
			));
			return $statement;
			//return $query->rowCount;
		} catch (\PDOException $ex) {
			exit($ex->getMessage());
		}
	}

    public function delete(int $id) {
		$statement = "DELETE FROM articles
					  WHERE id = :id";
		try {
			$query = $this->connection->prepare($statement);
			$query->execute(array(
				'id' => $id,
			));
			return $statement;
			//return $query->rowCount;
		} catch (\PDOException $ex) {
			exit($ex->getMessage());
		}
	}
}
