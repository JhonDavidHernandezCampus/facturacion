<?php
    class seller extends connect{
        use getInstance;
        private $queryPost = 'INSERT INTO tb_seller(seller) VALUES(:seller)';
        private $queryGetAll = 'SELECT id_seller AS "id", seller AS "seller" FROM tb_seller';
        private $queryUpdate = 'UPDATE tb_seller SET seller=:seller WHERE id_seller=:id';
        private $queryDelete = 'DELETE FROM tb_seller WHERE id_seller=:id';


        private $message;
        function __construct(public $Seller=1, private $id_seller){parent::__construct();}

        public function postSeller(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue('seller',$this->Seller);
                $res->execute();
                $this->message = ["Code"=> 200+$res->rowCount(), "Message"=>"Inserted data"];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
        public function getAllSeller(){
            try {
                $res= $this->conx->prepare($this->queryGetAll);
                $res->execute();
                $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }

        public function updateSeller(){
            try {
                $res = $this->conx->prepare($this->queryUpdate);
                $res->bindValue('id', $this->id_seller);
                $res->bindValue('seller', $this->Seller);
                $res->execute();
                $this->message = ["Code"=> 200, "Message"=> "Update data"];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);

            }
        }
        public function deleteSeller(){
            try {
                $res = $this->conx->prepare($this->queryDelete);
                $res->bindValue('id', $this->id_seller);
                $res->execute();
                $this->message = ["Code"=> 200, "Message"=> "Eliminate data"];
            } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }



/* 
        function getSeller(){
            return $this->Seller;
        }
        function setSeller(){
            $this->Seller = $Seller;
        } */
    }
?>