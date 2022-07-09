<?php 
	declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
		header('Location: login.php');
	}

    require_once(__DIR__.'/database/connection.db.php');
    require_once(__DIR__.'/database/dish.class.php');
    require_once(__DIR__.'/templates/common.tpl.php');
    require_once(__DIR__.'/templates/restaurant.tpl.php');
    require_once(__DIR__.'/database/review.class.php');
	require_once(__DIR__.'/database/restaurant.class.php');



	$db = getDatabaseConnection();
	$id = intval($_GET['id']);//Restaurant ID

    $categories = Dish::getDishesCategories($db, $id);
    $reviews = Review::getRestaurantReviews($db, $id); 

	drawHeader($_SESSION['type']);


	$restaurantName = Restaurant::getRestaurantNameFromRestaurantId($db, $id);

	drawDishesRestaurantName($restaurantName['RestaurantName']);
	
	foreach($categories as $category){
		$dishes = Dish::getRestaurantDishesByCategory($db, $category['name'],$id);
		drawDishesByCategory($dishes,$category['name']);
	}


    drawReviewSection($reviews,$id);

    drawFooter();
?>