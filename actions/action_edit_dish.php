<?php
	declare(strict_types = 1);

	session_start();

	require_once(__DIR__ .'/../database/connection.db.php');
	require_once(__DIR__ .'/../database/dish.class.php');
	require_once(__DIR__ .'/../imgUpload.php');
    require_once(__DIR__. '/../database/restaurant.class.php');

	$db = getDatabaseConnection();
    $dishId = $_POST['dishId'];

    Dish::updateDish($db, $_POST['dishName'], floatval($_POST['price']), $_POST['category'], intval($_POST['dishId']));
    $restaurant = Restaurant::getRestaurantByDishId($db, intval($dishId));

    if(isset($_FILES['dishImage']['tmp_name'])){
        if (!is_dir('temp')) mkdir('temp');
        move_uploaded_file($_FILES['dishImage']['tmp_name'], __DIR__ . "/../temp/dishes.jpg");//move picture into temporary folder
        uploadImage($db,"dishes",$dishId);
    }

    header('Location: /../restaurantPickerPage.php?id='.$restaurant->id);
?>
