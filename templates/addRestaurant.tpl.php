<?php declare(strict_types = 1); ?>

<?php function drawRestaurantRegister() { ?>
			<main>
				<div id="edit_restaurant_info_page">
					<h2>Register Restaurant</h2>
					<form action="actions/action_addRestaurant.php" method="post" enctype="multipart/form-data" class="register" >
						<div id="edit_restaurant_info">
							<input type="text" name="restaurantName" placeholder="Restaurant name" required>
							<input type="text" name="category" placeholder="Category" required>
							<input type="text" name="address" placeholder="Address" required>
							<input type="file" name="restaurantImage" required><!--TODO: Style this :^) -->
							<input type="submit" value="Upload"><!--TODO: AND this :^) -->
						</div>
					</form>
				</div>
			</main>
		</body>
<?php } ?>

<?php function drawDishRegister($restaurantId) { ?>
			<main>
				<div id="draw_edit_dish_info_page">
					<h2>Register Dish</h2>
					<form action="actions/action_addDish.php" method="post" enctype="multipart/form-data" class="register" >
						<div id="draw_edit_dish_info">
							<input type="text" name="dishName" placeholder="Dish name" required>
							<input type="number" name="price" placeholder="Price" step="0.01" min="0" required>
							<select type="text" name="category" placeholder="category" required>
								<option value="Meat">Meat</option>
								<option value="Fish">Fish</option>
								<option value="Vegetarian">Vegetarian</option>
								<option value="Diet">Diet</option>
								<option value="Dessert">Dessert</option>
							</select>
							<input type="file" name="dishImage" required><!--TODO: Style this :^) -->
							<input type="submit" value="Upload"><!--TODO: AND this :^) -->
							<input type="number" name="restaurantId" value="<?= $restaurantId?>" hidden>
						</div>
					</form>
				</div>
			</main>
		</body>
<?php } ?>

<?php function drawRestaurantsEdit(array $restaurants) { ?>
		<!-- TODO get restaurant name and put it below this line-->
	<main id="draw_restaurant_picker">
	<h2>Your Restaurants</h2>
		<a class="button" href="addRestaurantPage.php">Add Restaurant</a>
		<section class="category">
			<!-- TODO Talvez mudar o nome dessa classe para restaurants em vez de dishes-->
			<section class="dishes">
				<?php if( !empty($restaurants)){
					foreach ($restaurants as $restaurant){ ?>
					<div> 
						<section class="aspect-ratio-box">
								<img src="images/restaurants/originals/<?=$restaurant['id']?>.jpg" alt="foto do restaurante">
						</section>
						<p><?=$restaurant['name']?></p>
						
						<form action="editRestaurantPage.php" method="post">
							<button type="submit">Edit Restaurant</button>
							<input type="number" name="restaurantId" value="<?=$restaurant['id']?>" hidden>
						</form>
						<form action="addDishPage.php" method="post">
							<button type="submit">Add Dish</button>
							<input type="number" name="restaurantId" value="<?=$restaurant['id']?>" hidden>
						</form>
					</div>
				<?php } } ?>
			</section>
		</section>
	</main>
<?php } ?>

<?php function drawSelectedRestaurantEdit(array $dishes, $category) { ?>
	<main>
		<!-- TODO get restaurant name and put it below this line-->
	   <section class="category">
	   		<!-- TODO get category name and put it below this line-->
			<h3><?=$category?></h3>
			<section class="dishes">
				<?php if( !empty($dishes)){
					foreach ($dishes as $dish){ ?>
					<div >
						<section class="aspect-ratio-box">
							<img src="images/dishes/originals/<?=$dish['id']?>.jpg" alt="foto do prato">
						</section>
						<p><?=$dish['name']?></p>
						<p><?=$dish['price']?>&euro;</p>
						<!--<a href="editDishPage.php?id=<?=$dish['id']?>$dishes" class="button">Edit Dish</a>-->
						<form action="editDishPage.php" method="post">
							<button type="submit">Edit Dish</button>
							<input type="number" name="dishId" value="<?=$dish['id']?>" hidden>
						</form>
					</div>
				<?php } } ?>
			</section>
		</section>
	</main>
<?php } ?>

<?php function drawEditDish(Dish $dish) { ?>
	<main>
		<div id="draw_edit_dish_info_page">
			<h2>Edit Dish</h2>
			<form action="actions/action_edit_dish.php" method="post" enctype="multipart/form-data" class="register" >
				<div id="draw_edit_dish_info">
					<input type="text" name="dishName" placeholder="<?=$dish->name?>" required>
					<input type="number" name="price" placeholder="<?=$dish->price?>" required>
					<select type="text" name="category" required><!--TODO: add default category-->
						<option value="Meat">Meat</option>
						<option value="Fish">Fish</option>
						<option value="Vegetarian">Vegetarian</option>
						<option value="Diet">Diet</option>
						<option value="Dessert">Dessert</option>
					</select>
					<input type="file" name="dishImage"><!--TODO: Style this :^) -->
					<input type="submit" value="Upload"><!--TODO: AND this :^) -->
					<input type="number" name="dishId" value="<?=$dish->id?>" hidden>
				</div>
			</form>
		</div>
	</main>
<?php } ?>

<?php function drawRestaurantEditButton($restaurantId) { ?>
	<main>
		<section class="dishes">
			<div id="restaurant_edit_button"> 
				<form action="editRestaurantName.php" method="post">
					<button type="submit">Edit Restaurant</button>
					<input type="number" name="restaurantId" value="<?=$restaurantId?>" hidden>
				</form>
			</div>
		</section>
	</main>
<?php } ?>

<?php function drawEditRestaurantName(Restaurant $restaurant) { ?>
	<main>
		<div id="edit_restaurant_info_page">
			<h2>Edit Restaurant</h2>
			<form action="actions/action_edit_restaurant.php" method="post" enctype="multipart/form-data" class="register" >
				<div id="edit_restaurant_info">
					<input type="text" name="restaurantName" placeholder="<?=$restaurant->name?>" required>
					<input type="text" name="restaurantCategory" placeholder="<?=$restaurant->category?>" required>
					<input type="text" name="restaurantAddress" placeholder="<?=$restaurant->address?>" required>
					<input type="file" name="restaurantImage"><!--TODO: Style this :^) -->
					<input type="submit" value="Upload"><!--TODO: AND this :^) -->
					<input type="number" name="restaurantId" value="<?=$restaurant->id?>" hidden>
				</div>	
			</form>
		</div>
	</main>
<?php } ?>