<?php 
    $host = "localhost";
    $dbname = "christmas_wishes";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion réussie";
    } catch (PDOException $e) {
        echo "Une erreur est survenue lors de la connexion : " . $e->getMessage() . "</br>";
        die ();  
    }
?>