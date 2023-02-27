<?php
	include_once "controller/database_connection.php";

	$db = new DatabaseConnection(
		"127.0.0.1",
		"todo",
		"mariapass",
		"TodoListDB",
	);

	$db->initialize_db();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div>
		<input type="text" value="Input new item!">
		<button>Input</button>
	</div>
</body>
</html>