<?php
    class bill{
        use getInstance;
        function __construct(public $N_Bill, public $Bill_Date){
            echo $N_Bill+" esto esta en bill es una prueba para ver si funciona: XD";
        }
    }
?>