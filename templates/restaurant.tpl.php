<?php function drawRestaurantsByCategory(array $restaurants,$category, array $favoriteRestaurants) { ?>
		<!-- TODO get restaurant name and put it below this line-->
		<h2 class="categoryName"><?=$category?></h2>
		<section class="category">
			<!-- TODO Talvez mudar o nome dessa classe para restaurants em vez de dishes-->
			<section class="restaurants">
				<?php if( !empty($restaurants)){
					foreach ($restaurants as $restaurant){ ?>
					<div class="restaurantBox" > 
						<section class="aspect-ratio-box">
							<a href="restaurantPage.php?id=<?=$restaurant['id']?>">
								<img src="images/restaurants/originals/<?=$restaurant['id']?>.jpg" alt="foto do restaurante">
							</a>
						</section>
						<p><?=$restaurant['name']?></p>
						<i <?php if (in_array($restaurant['id'], $favoriteRestaurants)) {?> class="fas fa-heart <?=$restaurant['id']?>" <?php } else { ?> class="far fa-heart <?=$restaurant['id']?>" <?php } ?>></i>
					</div>
				<?php } } ?>
			</section>
		</section>
<?php } ?>

<?php function drawDishesRestaurantName($restaurant) { ?>
    <h2><?=$restaurant?></h2>
<?php } ?>

<?php function drawDishesByCategory(array $dishes, $category) { ?>
	<main>
	   <section class="category">
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
						<a href="actions/action_add_to_cart.php?id=<?=$dish['id']?>$dishes" class="button">Add to cart</a>
					</div>
				<?php } } ?>
			</section>
		</section>
	</main>
<?php } ?>



<?php function drawReviewSection(array $reviews,int $id) { ?>
		<section class="review">
			<?php foreach($reviews as $review) {?>
				<div class="review_box">
					<p class="user_name"><?=$review['user']?></p>
					<p><?= $review['text'] ?></p>
					<p class="score">Score: <?= $review['score'] ?></p>
				</div>
			<?php }?>
			</div>
			<button>Add your review</button>
			<div class="popupReview">
			<form action="actions/action_add_review.php" method="post" class="addReview">
			<i class="fa fa-times" aria-hidden="true"></i>
				<h2>Add your review</h2>
				Comment: <textarea name="comment" rows="5" cols="40" ></textarea>
				<h3>Give your rating:</h3>
				<div class="stars">
					<!--"fas fa-star" são preenchidas-->
					<!--"far fa-star" são não preenchidas-->
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</div>
				 <input type="number" name="score" hidden required>
				 <input type="number" name="restaurantid" value="<?=$id ?>" hidden>
				<button type="submit">Submit review</button>
			</form>
		</div>
		

		</section>
<?php } ?>

<?php function drawSearchBar() { ?>
	<h1>Restaurants</h1>
	<div id="search_bar">
		<select name="searchOptions">
				<option value="" disabled selected>Search restaurant based on</option>
				<option value="restaurant" >Restaurant name</option>
				<option value="dish">Dish name</option>
		</select>
		<input id="searchrestaurant" type="text" placeholder="search" disabled>
	</div>
<?php } ?>

<?php function drawFavorites(array $restaurants) { ?>
		<section class="restaurants">
			<?php if( !empty($restaurants)){
				foreach ($restaurants as $restaurant){ ?>
				<div class="restaurantBox" > 
					<section class="aspect-ratio-box">
						<a href="restaurantPage.php?id=<?=$restaurant->id?>">
							<img src="images/restaurants/originals/<?=$restaurant->id?>.jpg" alt="foto do restaurante">
						</a>
					</section>
					<p><?=$restaurant->name?></p>
				</div>
			<?php } } ?>
		</section>
<?php } ?>
