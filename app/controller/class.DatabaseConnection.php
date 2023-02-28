<?php

	class DatabaseConnection {
		protected string $host;
		protected string $user;
		protected string $password;
		protected string $database;

		protected PDO $PDOconnection;

		public function __construct(
			string $host,
			string $user, 
			string $password, 
			string $database)
		{
			$this->host = $host;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
		}

		public function initialize_db(): void {
			try {
				$this->PDOconnection = new PDO(
					"mysql:host=$this->host;dbname=$this->database", 
					$this->user, 
					$this->password);
				$this->PDOconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $exception) {
				echo "Fail: " . $exception->getMessage();
			}
		}

		public function select_all_db() {
			$stmnt = $this->PDOconnection->query("SELECT * FROM todoes");
			$stmnt->setFetchMode(PDO::FETCH_ASSOC);
			return $stmnt->fetchAll();
		}

		public function insert_db(string $content) {
			$this->PDOconnection->query("INSERT INTO todoes (content, done) VALUES ('$content', false);");
		}

		public function delete_db(int $id) {
			$this->PDOconnection->query("DELETE FROM todoes WHERE id=$id;");
		}
	}
