<?php 
	declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
		header('Location: login.php');
	}

	require_once(__DIR__.'/database/connection.db.php');
	require_once(__DIR__.'/templates/common.tpl.php');
	require_once(__DIR__.'/database/dish.class.php');
	require_once(__DIR__.'/database/restaurant.class.php');

	$db = getDatabaseConnection();
	$order = array();
	$customerID = $_SESSION['id'];

	drawHeader($_SESSION['type']);

	if(isset($_SESSION['cart'])){
		foreach ($_SESSION['cart'] as $id){
			$dish = Dish::getDishByID($db,$id);
			array_push($order, $dish);
		}
		$rest = Restaurant::getRestaurantById($db,strval($order[0]->restaurant));
		drawCart($order,$rest);
	}else{
		drawFunnyDog();
	}

	drawFooterPassword();
?>
