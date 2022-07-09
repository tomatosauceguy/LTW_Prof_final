<?php 
	declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
		header('Location: login.php');
	}

	require_once(__DIR__.'/database/connection.db.php');
	require_once(__DIR__.'/templates/common.tpl.php');
	require_once(__DIR__.'/database/restaurant.class.php');
    require_once(__DIR__.'/templates/restaurant.tpl.php');

	$db = getDatabaseConnection();

    $restaurantIds = Restaurant::getFavoriteRestaurantsOfUser($db,$_SESSION['id']);
    $restaurants = array();

    foreach($restaurantIds as $restaurantId){
        $restaurants[] = Restaurant::getRestaurantById($db, strval($restaurantId));
    }
	

	drawHeader($_SESSION['type']);

    drawFavorites($restaurants);

	drawFooterPassword();
?>