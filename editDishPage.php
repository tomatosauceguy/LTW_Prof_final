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
    require_once('database/dish.class.php');

	$db = getDatabaseConnection();
    
    $dishId = $_POST['dishId'];
    $dish = Dish::getDishById($db, $dishId);

    drawHeader($_SESSION['name']);
    drawEditDish($dish);
    drawFooterPassword();
?>