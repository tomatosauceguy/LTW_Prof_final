<?php

declare(strict_types = 1);

session_start();

if(!isset($_SESSION['name']) ){

header('Location: login.php');

}

require_once('database/connection.db.php');

require_once('database/restaurant.class.php');

$db = getDatabaseConnection();

$restaurants = Restaurant::searchRestaurants($db, $_GET['search']);

echo json_encode($restaurants);

?>