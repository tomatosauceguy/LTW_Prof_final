<?php
	declare(strict_types = 1);

	class Customer{
		public int $id;
		public string $name;
		public string $email;
		public string $type;
		public string $address;
		public string $phone;

		public function __construct(int $id, string $name, string $email
		,string $type, string $address ,string $phone){
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->type = $type;
			$this->address = $address;
			$this->phone = $phone;
		}

		static function getCustomerWithPassword(PDO $db, string $email, string $password) : ?Customer {
			$stmt = $db->prepare('SELECT UserId, Type, UserName, email, Password, UserAddress, PhoneNumber 
				FROM User 
				WHERE lower(email) = ? ');

			$stmt->execute(array(strtolower($email)));

			$customer = $stmt->fetch();

			if ($customer && password_verify($password, $customer['Password'])) {
				return new Customer(
					intval($customer['UserId']),
					$customer['UserName'],
					$customer['email'],
					$customer['Type'],
					$customer['UserAddress'],
					$customer['PhoneNumber']
					);
			}else return null;
		}

		static function getCustomer(PDO $db,int $id) : ?Customer {
			$stmt = $db->prepare( 'SELECT Type, UserName, email, UserAddress, PhoneNumber 
				FROM User 
				WHERE UserId = ?');

			$stmt->execute(array($id));

			if ($customer = $stmt->fetch()) {
				return new Customer(
					$id,
					$customer['UserName'],
					$customer['email'],
					$customer['Type'],
					$customer['UserAddress'],
					$customer['PhoneNumber']);
			}else return null;
		}

		function updateCustomerInfo(PDO $db){
			$stmt = $db->prepare('
				UPDATE User SET UserName = ?, PhoneNumber = ?, email = ?
				WHERE UserId = ?');

			$stmt->execute(array($this->UserName, $this->PhoneNumber, $this->email ,$this->id));
		}

		static function registerUser(PDO $db, string $name, string $password, string $email, string $address, string $phone, string $type) {

			$stmt = $db->prepare('INSERT INTO User (Type, UserName, Password, email, UserAddress, PhoneNumber) VALUES (?, ?, ?, ?, ?, ?);
			');

			$options = [];

			$stmt->execute(array($type, $name, password_hash($password, PASSWORD_DEFAULT, $options), $email, $address, $phone));

			$id = $db->lastInsertId();
			
			return $id;
			}
		
		function changePassword(PDO $db,string $password){
			$stmt = $db->prepare('UPDATE User SET Password = ? WHERE UserId = ?');

			$options = [];

			$stmt->execute(array(password_hash($password, PASSWORD_DEFAULT, $options), $this->id));
		}
	}

?>