<?php
	declare(strict_types = 1);

	session_start();

	require_once(__DIR__ .'/../database/connection.db.php');
	require_once(__DIR__ .'/../database/customer.class.php');

	$db = getDatabaseConnection();
    $customer = Customer::getCustomer($db,$_SESSION['id']);

	if( $_POST['confirmPassword'] == $_POST['password'] ){ 
		$id = $customer->changePassword($db, $_POST['password']);
	}
    header('Location: /../profile.php');
	
?>