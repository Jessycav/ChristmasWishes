<?php 
    $host = "localhost";
    $dbname = "christmas_wishes";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $conn->exec('SET NAMES "UTF8"'); // Passer toutes les chaînes de caractères en encodage UTF-8
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Une erreur est survenue lors de la connexion : " . $e->getMessage() . "</br>";
        die ();  
    }
?>