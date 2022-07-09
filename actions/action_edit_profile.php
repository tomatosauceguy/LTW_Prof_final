<?php
	declare(strict_types = 1);

	session_start();

	if (!isset($_SESSION['id'])) die(header('Location: /'));

	require_once(__DIR__.'/../database/connection.db.php');
	require_once(__DIR__.'/../database/customer.class.php');

	$db = getDatabaseConnection();

	$customer = Customer::getCustomer($db, $_SESSION['id']);

	if ($customer) {
		$customer->UserName = $_POST['newName'];
		$customer->PhoneNumber = $_POST['newPhone'];
		$customer->email = $_POST['newEmail'];
		$customer->add = $_POST['newAddress'];
		$_SESSION['name'] = $_POST['newName'];
		

		$customer->updateCustomerInfo($db);
	}

	header('Location: /../profile.php');
?>