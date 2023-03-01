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
		<form class="InputBar" action="./controller/inserttItem.php" method ="get">
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

					$dbc = DatabaseConnection::getInstance(
						HOST,
						USER,
						PASSWORD,
						DATABASE
					);

					$stmnt = $dbc->selectAllRecords();

					$list = new ItemsList($stmnt);
					$list->print_list();
				?>
			</ul>
		</div>
	</div>
</body>
</html>