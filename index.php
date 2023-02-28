<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./view/css/styles.css">

	<title>Document</title>
</head>
<body>
	<div class="Container">
		<div class="InputBar">
			<input type="text" value="Input new item!">
			<button>Add item</button>
		</div>
		<div class="ListContainer">
			<ul>
				<?php
					include_once "controller/class.DatabaseConnection.php";
					include_once "./view/class.ItemList.php";

					$db = new DatabaseConnection(
						"127.0.0.1",
						"todo",
						"mariapass",
						"TodoListDB",
					);

					$db->initialize_db(); 
					$stmnt = $db->select_all_db();

					$list = new ItemsList($stmnt);
					$list->print_list();
				?>
			</ul>
		</div>
	</div>
</body>
</html>