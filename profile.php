<?php 
	declare(strict_types = 1);

	session_start();

	if(!isset($_SESSION['name']) ){
        header('Location: login.php');
    }

	require_once(__DIR__.'/database/connection.db.php');
	require_once(__DIR__.'/database/customer.class.php');
	require_once(__DIR__.'/templates/common.tpl.php');
	require_once(__DIR__.'/templates/customer.tpl.php');

	$db = getDatabaseConnection();

	$customer = Customer::getCustomer($db, $_SESSION['id']);

	drawHeader($_SESSION['type']);
	drawProfile($customer);
	drawFooter();
?>