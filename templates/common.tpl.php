<?php declare(strict_types = 1); ?>

<?php function drawHeader(string $type) { ?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
			<link href="css/style.css" rel="stylesheet">
			<link href="css/layout.css" rel="stylesheet">
			<script src="https://kit.fontawesome.com/8a6a2935ab.js" crossorigin="anonymous"></script>
			<script src="../script_ajaxSearch.js" defer></script>
			<script src="../script_cart.js" defer></script>
			<script src="../script_reviews.js" defer></script>
			<script src="../script_favoriteRestaurant.js" defer></script>
			<title>Brand Spanking NEW Unter Eats</title>
		</head>
		<body>
			 <header>
				<div class="hamburger-menu">
					<input id="menu__toggle" type="checkbox" />
					<label class="menu__btn" for="menu__toggle">
						<span></span>
					</label>
					<ul class="menu__box">
						<li><a class="menu__item" href="home.php">Home</a></li>
						<li><a class="menu__item" href="profile.php">Profile</a></li>
						<li><a class="menu__item" href="favorites.php">Favorites</a></li>
						<li><a class="menu__item" href="orderHistory.php">Order History</a></li>
						<li <?php if($type != "restaurantOwner") {?> hidden <?php } ?>><a class="menu__item" href="restaurantPickerPage.php">Manage Restaurants</a></li>
						<li><a class="menu__item" href="actions/action_logout.php">Logout</a></li>
					</ul>
				</div>
				<h1>NEW UNTER EATS</h1>
				<a href="cart.php">Cart<img src="./TestImages/cartIcon.png" alt="cart icon"></a>
			</header>
<?php } ?>

<?php function tagOpen() { ?>
		<main id="mainBody">
<?php } ?>

<?php function tagClose() { ?>
		<main>
<?php } ?>

<?php function drawFooter() { ?>
		<footer>
			<p>Copyright &copy; LTW Project, 2022</p>
		</footer>
		</body>
	</html>
<?php } ?>

<?php function drawFooterPassword() { ?>
		<footer id="password_footer">
			<p>Copyright &copy; LTW Project, 2022</p>
		</footer>
		</body>
	</html>
<?php } ?>

<?php function drawCart(array $order,$restaurant) { ?>
	<main id="cart">
        <h1>Checkout</h1>
        <h2>Restaurant: <?=$restaurant->name?></h2>

        <section class="shipping">
        <h4>Shipping information</h4>
        <div id="cart_address">
            <label>Address:
                    <input type="text" name="name" value="<?=$restaurant->address?>" required disabled>

            </label>
                    <button>Edit address</button>
            
        </div>
            <p>Method of payment: Personal Card </p>
        </section>
        
        <section class="orders">
        <h2>Your order</h2>
		<?php if( !empty($order)){
			foreach ($order as $dish){ ?>
			<div class="dishBox_<?=$dish->id?>">
				<div id="dish_name_remove">	
					<p><?=$dish->name?></p>
					<button>Remove</button>
				</div>
				<!--<label>Quantity: </label>-->
				<div id="quantity_buttons">
					<button onclick="decrease(<?='qtyBox_'.$dish->id?>, <?=$dish->price?>)" >-</button>
					<input type="number" value="1" name="quantity" placeholder="quantity" id=<?="qtyBox_".$dish->id?> disabled>
					<button onclick="increase(<?='qtyBox_'.$dish->id?>, <?=$dish->price?>)" >+</button>
				</div>
				<p><?=$dish->price?>&euro;</p>
				<p hidden><?=$dish->id?></p>  <!--TODO: security encontrar melhor forma de acessar a isso--> 
			</div>
		<?php } } ?>

        <hr>
		<div id="checkout_box">
			<p>Total price: <strong>0&euro;</strong></p>
			<button id="cartCheckout">Checkout</button>
		</div>
        </section>
    </main>

<?php } ?> 

<?php function drawFunnyDog() { ?>
	<main id="empty_cart">
		<h3>Cart Empty :^(</h3>
		<picture>
		<img src="images/miscellaneous/funnydog.jpeg">
		</picture>
	</main>
<?php } ?>