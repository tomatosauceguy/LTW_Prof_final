<?php
    declare(strict_types = 1);
    require_once('database/connection.db.php');

    session_start();

    $db = getDatabaseConnection();

    $user = $_SESSION['id'];
    $restaurant = $_GET['restaurantId'];

    $number = 0;
    // Verifica se o id do restaurante já existe na DB para aquele user
    $stmt = $db->prepare('SELECT * FROM Favorite WHERE UserId = ? AND RestaurantId = ?');
    $stmt->execute(array($user, $restaurant));

    while($row = $stmt->fetch()){
        $number = $number + 1;
    }
    
    
    // se existir, apaga o favorite - problema porque estou a usar um update query
    if($number > 0){
        $delete = $db->prepare('DELETE FROM Favorite WHERE UserId = ? AND  RestaurantId = ?;');
        $delete->execute(array($user, $restaurant));
    }else{
        // se não existir, adiciona o favorite
        $insert = $db->prepare('INSERT INTO Favorite (UserId, RestaurantId) VALUES ( ?, ?);');
        $insert->execute(array($user, $restaurant));
    }


?>