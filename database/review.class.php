<?php 
    declare(strict_types = 1);

    class Review{
        public int $id;
        public string $text;
        public int $score;
        public int $restaurant;
        public int $user;


        public function __construct(int $id, string $text, int $score, int $restaurant, int $user){
            $this->id = $id;
            $this->text = $text;
            $this->score = $score;
            $this->restaurant = $restaurant;
            $this->user = $user;
        }

        static function getRestaurantReviews(PDO $db, int $id) : array {
            $stmt = $db->prepare('SELECT ReviewText, ReviewScore, User FROM Review WHERE RestaurantId = ?');
            $stmt->execute(array($id));

            $reviews = array();

            while ($review = $stmt->fetch()) {
                $name = $db->prepare('SELECT UserName FROM User WHERE UserId = ?');
                $name->execute(array($review['User']));

                $temp = $name->fetch();

                $reviews[] = array(
                    'text' => $review['ReviewText'],
                    'score' =>  $review['ReviewScore'],
                    'user' => $temp['UserName']
                );
            }
            return $reviews;
        }

        static function addReview(PDO $db, string $comment, int $score, int $restaurant, int $user){
            $stmt = $db->prepare('INSERT INTO Review (ReviewText, ReviewScore, RestaurantId, User) VALUES ( ?, ?, ?, ?);
			');

            $stmt->execute(array($comment, $score, $restaurant, $user));
            }
            
        }

?>