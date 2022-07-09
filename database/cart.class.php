<?php
	declare(strict_types = 1);

	class Cart{
		public int $id;
        public float $total;
        //public int $quantity;

		public function __construct(int $id, float $toal /*, int $quantity*/){
            $this->id = $id;
            $this->total = $total;
        }

        // seria pra pegar as coisas que estão no carrinho? Mas não sei a já está no sql, food order?
        static function getCartItems(PDO $db,int $id) : array{

        }

	}
?>