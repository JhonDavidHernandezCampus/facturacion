<?php
    abstract class credentials{
        //public $driver = "mysql";
        protected $host = "172.16.48.210";
        private $user = "sputnik";
        private $password = "Sp3tn1kC@";
        protected $dbname = "db_hunter_facture_jhon_ferrer";
        private $port = 3306;
        function __get($name){
            return $this->{$name};
        }
    }


?>