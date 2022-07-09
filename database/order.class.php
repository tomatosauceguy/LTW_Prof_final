<?php 
    declare(strict_types = 1);
    require_once('database/restaurant.class.php');
    require_once('database/dish.class.php');

    class Order{
        public int $orderId;
        public string $date;
        public string $state;
        public array $contents;
        public Restaurant $restaurant;

        public function __construct(int $orderId, string $date, string $state, array $contents){
            $this->orderId = $orderId;
            $this->date = $date;
            $this->state = $state;
            $this->contents = $contents;
            //$this->restaurant = $restaurant;
        }

        static function getAllOrdersByUser(PDO $db, int $userId) : array {
            $stmt = $db->prepare('SELECT OrderId, OrderDate, OrderState FROM FoodOrder WHERE User = ?');
            $stmt->execute(array($userId));

            $orders = array();

            while($order = $stmt->fetch()){
                $stmtDish = $db->prepare('SELECT DishId, quantity FROM DishOrder WHERE OrderID = ?');
                $stmtDish->execute(array($order['OrderId']));
                
                $stmtRestaurant = $db->prepare('SELECT DishId, quantity FROM DishOrder WHERE OrderID = ?');
                $stmtRestaurant->execute(array($order['OrderId']));

                $orderContents = array();
                $dishId = 0;
                while ($content = $stmtDish->fetch()){
                    $dishId = $content['DishId'];
                    $dish = Dish::getDishById($db,$dishId);
                    $restaurant = Restaurant::getRestaurantByDishId($db,intval($dishId));//This isnt exactly efficient
                    $orderContents[] = array(
                        'dishId' => $dish->id,
                        'dishName' => $dish->name,
                        'dishPrice' => $dish->price,
                        'dishCategory' => $dish->price,
                        'restaurantId' => $dish->restaurant,
                        'restaurantName' => $restaurant->name,
                        'quantity' => $content['quantity']
                    );
                }

                

                $orders[] = new Order(
                    intval($order['OrderId']),
                    $order['OrderDate'],
                    $order['OrderState'],
                    $orderContents,
                    //$restaurant
                );
            }
            return $orders;
        }
    }
?>