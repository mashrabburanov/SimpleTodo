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

    $urlMain = "../index.php";
    $urlError = "../view/index.html";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET["content"])) {
            $data = $_GET["content"];
            $db->insert_db($data);
            header("Location: $urlMain");
            die();
        }
        else {
            header("Location: $urlError");
            die();
        }
    } else {
        header("Location: $urlError");
        die();
    }
