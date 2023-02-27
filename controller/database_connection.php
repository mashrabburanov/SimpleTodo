<?php
	
	class Database {
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

		public function initialize_db() {
			try {
				$PDOconnection = new PDO(
					"mysql:host=$this->host;dbname=$this->database", 
					$this->user, 
					$this->password);
				$PDOconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $exception) {
				echo "Fail: " . $exception->getMessage();
			}
		}
	}
