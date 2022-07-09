PRAGMA foreign_key = on;

INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'McDonnald`s', 'FastFood', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 2);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Friends', 'FastFood', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 5);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Al Gusto', 'FastFood', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 8);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Ching Chong, Bing Bong', 'FastFood', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 3);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'FastFood', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);

INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'Mexican', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'Mexican', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'Mexican', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);


INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'African', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'African', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);
INSERT INTO Restaurant(RestaurantName, Category, RestaurantAddress, OwnerId) VALUES ( 'Rui Rielas', 'African', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', 1);



INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'PussySlayer', '123', 'Rua Doctor Roberto Frias s/n, 4200-465 Porto, Portugal', '+351911234567','123@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('restaurantOwner', 'wackyjohn', '123', 'Praça da Liberdade, 126, 4000-322 Porto, Portugal', '+351915439194','1234@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'child_toucher69', '123', 'Rua Doctor Roberto Frias s/n, 4200-465 Porto, Portugal', '+35191538729349' ,'1235@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'smokeweedeveryday', '123', 'Rua professor Duarte Leite , 0583-125 Porto, Portugal', '+3519104818374','1236@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'my_father_beats_me_everyday', '123', 'Rua Alcunha Da Mata , 7680-102 Porto, Portugal', '+351910473628','1237@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'sir_cums_allot', '123', 'Rua Antonio D`Augusta, 5325-481 Porto, Portugal', '+3519112309573','1238@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('restaurantOwner', 'COME_TO_BRASIUUU', '123', 'Rua Almirante Reis 2344-130 Porto, Portugal', '+3519111239573','1239@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'super_mario', '123', 'Rua ALguidar Bandeiras, 6521-213 Porto, Portugal', '+35191103947532','12310@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('Customer', 'tommy', '123', 'Praça Don Afonso D`Almier, 3432-542 Porto, Portugal', '+3519118503648','12311@mail.com');
INSERT INTO User(Type, UserName, Password, UserAddress, PhoneNumber, email) VALUES ('restaurantOwner', 'monkey_soup', '123', 'Rua Santo Antonio, 5421-090 Porto, Portugal', '+3519157829426','12312@mail.com');

/*
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Big Mc', 4.50, '', 'Meat');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('CBO', 6.50, '', 'Meat');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Sundae', 1.50, '', 'Dessert');

INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Bitoque', 7.40, '', 'Meat');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Peixe do dia', 5.30, '', 'Fish');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Bacalhau cozido com grao', 6.90, '', 'Fish');

INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Pizza Margarita', 7.80, '', 'Vegetarian');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Pasta al Neri', 8.00, '', 'Fish');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Lasagna', 6.60, '', 'Meat');

INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Xau Ming de vaca', 8.70, '', 'Meat');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Pato a Pequim', 9.90, '', 'Meat');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Chop suey de gambas', 7.80, '', 'Fish');

INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Bife a casa', 5.00, '', 'Meat');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Lulas fritas', 6.50, '', 'Fish');
INSERT INTO Dish(Name, Price, Image, Category) VALUES ('Prato de legumes', 9.90, '', 'Vegetarian');
*/


INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Big Mc', 4.50, '', 'Meat', 1);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('CBO', 6.50, '', 'Meat', 1);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Sundae', 1.50, '', 'Dessert', 1);

INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Bitoque', 7.40, '', 'Meat', 2);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Peixe do dia', 5.30, '', 'Fish', 2);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Bacalhau cozido com grao', 6.90, '', 'Fish', 2);

INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Pizza Margarita', 7.80, '', 'Vegetarian', 3);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Pasta al Neri', 8.00, '', 'Fish', 3);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Lasagna', 6.60, '', 'Meat', 3);

INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Xau Ming de vaca', 8.70, '', 'Meat', 4);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Pato a Pequim', 9.90, '', 'Meat', 4);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Chop suey de gambas', 7.80, '', 'Fish', 4);

INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Bife a casa', 5.00, '', 'Meat', 5);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Lulas fritas', 6.50, '', 'Fish', 5);
INSERT INTO Dish(Name, Price, Image, Category, RestaurantId) VALUES ('Prato de legumes', 9.90, '', 'Vegetarian', 5);






INSERT INTO FoodOrder(OrderDate, OrderState, User) VALUES ('2007-01-01 20:01:51', 'Ready', 2);
INSERT INTO FoodOrder(OrderDate, OrderState, User) VALUES ('2007-01-01 12:58:15', 'Preparing', 4);
INSERT INTO FoodOrder(OrderDate, OrderState, User) VALUES ('2007-01-01 13:43:12', 'Delivered', 7);
INSERT INTO FoodOrder(OrderDate, OrderState, User) VALUES ('2007-01-01 13:09:29', 'Ready', 9);
INSERT INTO FoodOrder(OrderDate, OrderState, User) VALUES ('2007-01-01 19:43:40', 'Received', 10);

INSERT INTO Review(ReviewText, ReviewScore, RestaurantId, User) VALUES ('very good, very nice, me like 10/10', 5, 2, 1);
INSERT INTO Review(ReviewText, ReviewScore, RestaurantId, User) VALUES ('was alright', 3, 3, 8);
INSERT INTO Review(ReviewText, ReviewScore, RestaurantId, User) VALUES ('what a shit show', 1, 1, 6);
INSERT INTO Review(ReviewText, ReviewScore, RestaurantId, User) VALUES ('pretty good not gonna lie', 4, 4, 2);
INSERT INTO Review(ReviewText, ReviewScore, RestaurantId, User) VALUES ('they better get their shit together fr fr', 2, 5, 10);

INSERT INTO DishOrder(OrderId, DishId, quantity) VALUES (1, 11, 2);
INSERT INTO DishOrder(OrderId, DishId, quantity) VALUES (2, 2, 1);
INSERT INTO DishOrder(OrderId, DishId, quantity) VALUES (3, 8, 3);
INSERT INTO DishOrder(OrderId, DishId, quantity) VALUES (4, 4, 2);
INSERT INTO DishOrder(OrderId, DishId, quantity) VALUES (5, 15, 1);