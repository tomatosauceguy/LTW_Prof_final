<?php
	declare(strict_types = 1);

	session_start();

	require_once(__DIR__ .'/../database/connection.db.php');
	require_once(__DIR__ .'/../database/dish.class.php');
	require_once(__DIR__ .'/../imgUpload.php');
    require_once(__DIR__ .'/../database/restaurant.class.php');

	$db = getDatabaseConnection();
    $restaurantId = $_POST['restaurantId'];

    Restaurant::updateRestaurant($db, $_POST['restaurantName'], $_POST['restaurantCategory'], $_POST['restaurantAddress'], intval($restaurantId));

    if(isset($_FILES['restaurantImage']['tmp_name'])){
        if (!is_dir('temp')) mkdir('temp');
        move_uploaded_file($_FILES['restaurantImage']['tmp_name'], __DIR__ . "/../temp/restaurants.jpg");//move picture into temporary folder
        uploadImage($db,"restaurants",$restaurantId);
    }

    header('Location: /../restaurantPickerPage.php?id='.$restaurantId);
?>