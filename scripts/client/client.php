<?php
class client extends connect{
    private $queryPost = 'INSERT INTO tb_client(identificacion_client,full_name_client,email_client,address_client,phone_client) VALUES(:cc,:name,:email,:direction,:cellphone)';
    private $message;
    use getInstance;
    function __construct(private $Identification, public $Full_Name, public $Email, private $Address, private $Phone){parent::__construct();}
    public function postClient(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("email", $this->Email);
            $res->bindValue("cc", $this->Identification);
            $res->bindValue("name", $this->Full_Name);
            $res->bindValue("direction", $this->Address);
            $res->bindValue("cellphone", $this->Phone);
            $res->execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

        public function getAllClient(){
        try {
            $res = $this->conx->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
}
?>  