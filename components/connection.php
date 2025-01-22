<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "christmas_wishlist";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>