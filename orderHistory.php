<?php 
    declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
        header('Location: login.php');
    }

    require_once('database/connection.db.php');
	require_once('templates/common.tpl.php');
    require_once('templates/customer.tpl.php');
    require_once('database/order.class.php');


	$db = getDatabaseConnection();
    $orders = Order::getAllOrdersByUser($db,$_SESSION['id']);

    //get all orders from a user
    //get contents of all those orders
    //get restaurant that made that order

    drawHeader($_SESSION['type']);
    drawOrderHistory($orders);
    drawFooter();
?>