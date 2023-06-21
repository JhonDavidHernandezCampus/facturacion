<?php
    class bill extends connect{
        use getInstance;
        private $queryPost = 'INSERT INTO tb_bill( n_bill,  bill_date_bill) VALUES (:numero,:fecha)';
        private $message;
        function __construct(public $N_Bill, public $Bill_Date){parent::__construct();}

        public function postBill(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue('numero',$this->N_Bill);
                $res->bindValue('fecha',$this->Bill_Date);
                $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
            } catch (\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
    }
    /* 
    {
        "N_Bill":"12",
        "Bill_Date":"d"
    }
 */
?>