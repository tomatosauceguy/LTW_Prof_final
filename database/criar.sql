.mode columns
.header ON

DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS FoodOrder;
DROP TABLE IF EXISTS Review;


CREATE TABLE Restaurant(
    RestaurantId INTEGER PRIMARY KEY AUTOINCREMENT,
    RestaurantName VARCHAR(100) NOT NULL,
    Category VARCHAR(100) NOT NULL,
    RestaurantAddress VARCHAR(300) NOT NULL,
    OwnerId INTEGER,
    Image,
  
	FOREIGN KEY (OwnerId) REFERENCES User(UserId)

);

CREATE TABLE User(
    UserId INTEGER PRIMARY KEY AUTOINCREMENT,
    Type TEXT CHECK(Type = 'restaurantOwner' OR  Type ='Customer') NOT NULL DEFAULT 'Customer',
    UserName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    Password INTEGER NOT NULL,
    UserAddress VARCHAR(300) NOT NULL,
    Image VARCHAR,
    PhoneNumber VARCHAR(9)
);

CREATE TABLE Dish(
    DishId INTEGER PRIMARY KEY AUTOINCREMENT,
    Name VARCHAR(100),
    Price FLOAT NOT NULL,
    Image VARCHAR, --TO DO
    Category TEXT CHECK(Category = 'Meat' OR Category = 'Fish' OR Category = 'Vegetarian' OR Category = 'Diet' OR Category = 'Dessert') NOT NULL,
    RestaurantId INTEGER,
    FOREIGN KEY (RestaurantId) REFERENCES Restaurant(RestaurantId)
);

CREATE TABLE FoodOrder(  --Order é uma palavra reservada
    OrderId INTEGER PRIMARY KEY AUTOINCREMENT,
    OrderDate DATE NOT NULL,
    OrderState TEXT CHECK(OrderState = 'Preparing' OR OrderState = 'Ready' OR OrderState = 'Delivered' OR OrderState = 'Received') NOT NULL DEFAULT 'Preparing',
    User INTEGER NOT NULL,
    FOREIGN KEY (User) REFERENCES User(UserId)
);

CREATE TABLE Review(
    ReviewId INTEGER PRIMARY KEY AUTOINCREMENT,
    ReviewText VARCHAR(500),
    ReviewScore INTEGER(5),
    RestaurantId INTEGER,
    User INTEGER,
    FOREIGN KEY (RestaurantId) REFERENCES Restaurant(RestaurantId),
    FOREIGN KEY (User) REFERENCES User(UserId)
);

CREATE TABLE DishOrder(
    OrderId INTEGER REFERENCES FoodOrder,
    DishId INTEGER REFERENCES Dish,
    quantity INTEGER NOT NULL,
    PRIMARY KEY (OrderId, DishId)
);

CREATE TABLE Favorite(
    UserId INTEGER REFERENCES User,
    RestaurantId INTEGER REFERENCES Restaurant,
    PRIMARY KEY (UserId, RestaurantId)
);