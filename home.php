<?php 
	declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
        header('Location: login.php');
    }

	require_once(__DIR__.'/database/connection.db.php');
	require_once(__DIR__.'/database/restaurant.class.php');
	require_once(__DIR__.'/database/customer.class.php');
	require_once(__DIR__.'/templates/common.tpl.php');
	require_once(__DIR__.'/templates/restaurant.tpl.php');


	$db = getDatabaseConnection();
	$categories = Restaurant::getRestaurantCategories($db);
	$favoriteRestaurants = Restaurant::getFavoriteRestaurantsOfUser($db, $_SESSION['id']);

	drawHeader($_SESSION['type']);
	drawSearchBar();

	tagOpen();
	foreach ($categories as $category) {
		$restaurants = Restaurant::getRestaurantsByCategory($db,$category);
		drawRestaurantsByCategory($restaurants,$category, $favoriteRestaurants);
	}
	tagClose();
		
	drawFooter();
?>