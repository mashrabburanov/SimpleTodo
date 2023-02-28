<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./view/css/styles.css">

	<title>TodoList</title>
</head>
<body>
	<div class="Container">
		<form action="./controller/inserttItem.php" class="InputBar">
			<input type="text" value="Input new item!" name="content">
			<input type="submit" value="Add item">
		</form>
		<div class="ListContainer">
			<ul>
				<?php
					# initial print
					include_once "controller/class.DatabaseConnection.php";
					include_once "./view/class.ItemList.php";
					include_once "./controller/constants.php";

					$db = new DatabaseConnection(
						HOST,
						USER,
						PASSWORD,
						DATABASE
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