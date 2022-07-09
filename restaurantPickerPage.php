<?php 
    declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
        header('Location: login.php');
    }

    if($_SESSION['type'] != "restaurantOwner"){
        header('Location: home.php');
    }

    require_once(__DIR__.'/database/connection.db.php');
	require_once(__DIR__.'/templates/common.tpl.php');
    require_once(__DIR__.'/templates/addRestaurant.tpl.php');
    require_once(__DIR__.'/database/restaurant.class.php');

	$db = getDatabaseConnection();

    $restaurants = Restaurant::getRestaurantsByOwner($db, $_SESSION['id']);

    drawHeader($_SESSION['type']);
    drawRestaurantsEdit($restaurants);

    drawFooter();
?>