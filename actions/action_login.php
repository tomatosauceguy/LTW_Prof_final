<?php
	declare(strict_types = 1);

	session_start();

	require_once(__DIR__ .'/../database/connection.db.php');
	require_once(__DIR__ .'/../database/customer.class.php');

	$db = getDatabaseConnection();

	$customer = Customer::getCustomerWithPassword($db, $_POST['email'], $_POST['password']);

	if ($customer) {
		$_SESSION['id'] = $customer->id;
		$_SESSION['name'] = $customer->name;
		$_SESSION['type'] = $customer->type;
		header('Location: /../home.php');
	}else{	//login failed
		header('Location: /../login.php');
	}

?>