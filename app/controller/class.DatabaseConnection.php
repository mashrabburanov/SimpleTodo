<?php

	class DatabaseConnection {
		protected PDO $PDOconnection;
		private static DatabaseConnection $instance;

		protected function __construct(
			string $host,
			string $user, 
			string $password, 
			string $database)
		{
			$this->initializeDBC($host, $user, $password, $database);
		}

		protected function __clone()
		{
			
		}

		public static function getInstance(
			string $host, 
			string $user, 
			string $password, 
			string $database): DatabaseConnection 
		{
			if (!isset(self::$instance)) {
				self::$instance = new DatabaseConnection(
					$host,
					$user,
					$password,
					$database
				);
			}

			return self::$instance;
		}
		
		protected function initializeDBC(
			string $host,
			string $user,
			string $password,
			string $database): void 
			{
				try {
					$this->PDOconnection = new PDO("mysql:host=$host;dbname=$database", $user, $password);
					$this->PDOconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				} catch (PDOException $exception) {
					echo "Fail: " . $exception->getMessage();
				}
			}

		public function reinitializeDBC(
			string $host,
			string $user,
			string $password,
			string $database) 
		{
			$this->initializeDBC($host, $user, $password, $database);
		}
			
		public function selectAllRecords() {
			$stmnt = $this->PDOconnection->query("SELECT * FROM todoes");
			$stmnt->setFetchMode(PDO::FETCH_ASSOC);
			
			return $stmnt->fetchAll();
		}

		public function insertRecord(string $content) {
			$this->PDOconnection->query("INSERT INTO todoes (content, done) VALUES ('$content', false);");
		}

		public function deleteRecord(int $id) {
			$this->PDOconnection->query("DELETE FROM todoes WHERE id=$id;");
		}

		# alter done col
	}
