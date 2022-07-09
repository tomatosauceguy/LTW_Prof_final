<?php

declare(strict_types = 1);

session_start();

if(!isset($_SESSION['name']) ){

header('Location: login.php');

}

require_once('database/connection.db.php');

require_once('database/dish.class.php');

$db = getDatabaseConnection();

$dishes = Dish::searchDishes($db, $_GET['search']);

echo json_encode($dishes);

?>