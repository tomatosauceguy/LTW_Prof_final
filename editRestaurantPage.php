<?php 
	declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
		header('Location: login.php');
	}

    require_once('database/connection.db.php');
    require_once('database/dish.class.php');
    require_once('templates/common.tpl.php');
    require_once('templates/restaurant.tpl.php');
    require_once('database/review.class.php');
    require_once('templates/addRestaurant.tpl.php');
	require_once('database/restaurant.class.php');



	$db = getDatabaseConnection();
	$restaurantId = intval($_POST['restaurantId']);

    $categories = Dish::getDishesCategories($db, $restaurantId); 

	drawHeader($_SESSION['name']);

	$restaurantName = Restaurant::getRestaurantNameFromRestaurantId($db, $restaurantId);

	drawDishesRestaurantName($restaurantName['RestaurantName']);
	drawRestaurantEditButton($restaurantId);

	foreach($categories as $category){
		$dishes = Dish::getRestaurantDishesByCategory($db, $category['name'],$restaurantId);
		drawSelectedRestaurantEdit($dishes,$category['name']);
	}

    drawFooter();
?>