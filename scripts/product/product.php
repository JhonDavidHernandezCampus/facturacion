<?php
    class product extends connect{
        use getInstance;
        private $queryPost = 'INSERT INTO tb_product(id_product,name_product,amount_product,value_prodcut) VALUES(:id,:name,:amount,:value)';
        private $queryGetAll = 'SELECT id_product AS "id", name_product AS "name", amount_product AS "amount", value_prodcut AS "value" FROM tb_product';
        private $queryUpdate = 'UPDATE tb_product SET id_product=:id,name_product=:name,amount_product=:amount,value_prodcut=:value WHERE id_product=:id';
        private $deleteProduct = 'DELETE FROM tb_product WHERE id_product =:id';

        private $message;
        function __construct(private $id_product=1, public $name_product=1, public $amount=1, public $value_product=1){parent::__construct();}
        public function postProduct(){
            try {
                $res= $this->conx->prepare($this->queryPost);
                $res->bindValue('id',$this->id_product);
                $res->bindValue('name',$this->name_product);
                $res->bindValue('amount',$this->amount);
                $res->bindValue('value',$this->value_product);
                $res->execute();

                $this->message =  ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
            } catch (\PDOException  $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
        public function getAllProduct(){
            try {
                $res = $this->conx->prepare($this->queryGetAll);
                $res->execute();
                $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
        public function updateProduct(){
            try {
                $res = $this->conx->prepare($this->queryUpdate);
                $res->bindValue('id',$this->id_product);
                $res->bindValue('name',$this->name_product);
                $res->bindValue('amount',$this->amount);
                $res->bindValue('value',$this->value_product);
                $res->execute();
                $this->message = ["Code"=> 200, "Message"=> "Update data"];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
        public function deleteProduct(){
            try {
                $res = $this->conx->prepare($this->deleteProduct);
                $res->bindValue('id',$this->id_product);
                $res->execute();

                $this->message = ["Code"=> 200, "Message"=> "Eliminate data"];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
    }
?>