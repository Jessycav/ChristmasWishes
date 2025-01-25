<?php 
    require_once 'header.php';
    require_once 'connection.php';

    if (isset($_POST['createGift'])) {
        $giftTitle = htmlspecialchars($_POST['giftTitle']);
        $giftDescription = htmlspecialchars($_POST['giftDescription']);
        $giftUrl = htmlspecialchars($_POST['giftUrl']);
        $giftImage = htmlspecialchars($_POST['giftImage']);

        $sql = "INSERT INTO gift (gift_title, gift_description, gift_url, gift_image) VALUES (:giftTitle, :giftDescription, :giftUrl, :giftImage)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':giftTitle', $giftTitle);
        $stmt->bindValue(':giftDescription', $giftDescription);
        $stmt->bindValue(':giftUrl', $giftUrl);
        $stmt->bindValue(':giftImage', $giftImage);

        $result = $stmt->execute();

        if(!$result) {
            echo "Un problème est survenu, l'enregistrement n'a pas été effectué";
        }
    }else {
        echo "Le cadeau est enregistré";
    }
?>