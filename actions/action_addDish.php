<?php
	declare(strict_types = 1);

	session_start();

	require_once(__DIR__.'/../database/connection.db.php');
	require_once(__DIR__.'/../database/dish.class.php');
	require_once(__DIR__.'/../imgUpload.php');
	require_once(__DIR__.'/../templates/addRestaurant.tpl.php');//TODO: JANKY, fix later

	$db = getDatabaseConnection();

    $id = Dish::registerDish($db, $_POST['dishName'], floatval($_POST['price']), $_POST['category'], intval($_POST['restaurantId']));
    if (!is_dir(__DIR__.'/../temp')) mkdir(__DIR__.'/../temp');
    move_uploaded_file($_FILES['dishImage']['tmp_name'], __DIR__ . "/../temp/dishes.jpg");//move picture into temporary folder
    uploadImage($db,"dishes",$id);

    header('Location: /../restaurantPickerPage.php');    
?>