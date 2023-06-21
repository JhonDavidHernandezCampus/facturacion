<?php
class client extends connect{
    private $queryPost = 'INSERT INTO tb_client(identificacion_client,full_name_client,email_client,address_client,phone_client) VALUES(:cc,:name,:email,:direction,:cellphone)';
    private $queryGetAll = 'SELECT identificacion_client AS "cc", full_name_client AS "name", email_client AS "email", address_client AS "direction", phone_client AS "cellphone" FROM tb_client';
    private $queryUpdate = 'UPDATE tb_client SET identificacion_client=?,full_name_client=?,email_client=?,address_client=?,phone_client=? WHERE identificacion_client=?';
    private $queryDelete = 'DELETE FROM tb_client WHERE identificacion_client =:cc';
    
    private $message;
    use getInstance;
    function __construct(private $Identification =1, public $Full_Name=1, public $Email=1, private $Address =1, private $Phone =1){parent::__construct();}
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


    public function updateClient(){
        try {
            $res = $this->conx->prepare($this->queryUpdate);
            $res = $res->execute([
                $this->Identification,
                $this->Full_Name,
                $this->Email,
                $this->Address,
                $this->Phone,
                $this->Identification
            ]);
            $this->message = ["Code"=> 200, "Message"=> "Update data"];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }   
    }
    public function deleteClient(){
        try {
            $res = $this->conx->prepare($this->queryDelete);
            $res->bindValue('cc', $this->Identification);
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