<?php 
    declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
        header('Location: login.php');
    }

    require_once('database/connection.db.php');
	require_once('templates/common.tpl.php');
    require_once('templates/addRestaurant.tpl.php');
    require_once('database/restaurant.class.php');

	$db = getDatabaseConnection();

    $restaurantId = $_POST['restaurantId'];
    $restaurant = Restaurant::getRestaurantById($db, strval($restaurantId));

    drawHeader($_SESSION['name']);
    drawEditRestaurantName($restaurant);
    drawFooterPassword();
?>