<?php 
    include_once "./class.DatabaseConnection.php";
    include_once "./constants.php";

    $db = new DatabaseConnection(
        HOST,
        USER,
        PASSWORD,
        DATABASE
    );

    $db->initialize_db();

    $url = "../index.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET["content"])) {
            $data = $_GET["content"];
            $db->insert_db($data);
            header("Location: $url");
            die();
        }
    }

    header("Location: $url");