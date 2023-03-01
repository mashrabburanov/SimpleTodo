<?php 
    include_once "./class.DatabaseConnection.php";
    include_once "./constants.php";

    function insertItem() {
        $dbc = DatabaseConnection::getInstance(
            HOST,
            USER,
            PASSWORD,
            DATABASE
        );

        $urlMain = "../index.php";
        $urlError = "../view/index.html";
    
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (!empty($_GET["content"])) {
                $data = $_GET["content"];
                $dbc->insertRecord($data);
                header("Location: $urlMain");
                die();
            }
            else {
                header("Location: $urlError");
            }
        } else {
            header("Location: $urlError");
        }
    }


