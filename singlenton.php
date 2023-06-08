<?php
    declare(strict_types=1);
    class Humano{
        static $instance;
        //public $name;
        //public $age;
        function __construct(public $name,public $age){ }

        static function getInstance(){
            $arg = func_get_args();
            $arg = array_pop($arg);
            if(self::$instance == null){
                self::$instance = new self(...(array) $arg);
            }
            return self::$instance;
        }
        public function getName(){
            return $this->name;
        }
    }

    var_dump(Humano::getInstance(["name"=>"Jhon","age" => "19"])->getName());
    echo dirname(__DIR__);


/* 

    class Informacion{
        function __construct(public $address,public $bill_date,public $email,public $full_name,public $Identificacion, public $n_bill, public $phone,public $seller){}




    } */

?>

<?php
//codigo del trainer 
//    trait getInstance{
//        public static $instance;
//        public static function getInstance() {
//            $arg = func_get_args();
//            $arg = array_pop($arg);
//            return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
//        }
//    }
//    function autoload($class) {
//        // Directorios donde buscar archivos de clases
//        $directories = [
//            dirname(__DIR__).'/scripts/db/',
//            dirname(__DIR__).'/scripts/user/',
//        ];
//        // Convertir el nombre de la clase en un nombre de archivo relativo
//        $classFile = str_replace('\\', '/', $class) . '.php';
//    
//        // Recorrer los directorios y buscar el archivo de la clase
//        foreach ($directories as $directory) {
//            $file = $directory.$classFile;
//            var_dump($file);
//            // Verificar si el archivo existe y cargarlo
//            if (file_exists($file)) {
//                require $file;
//                break;
//            }
//        }
//    }
//    spl_autoload_register('autoload');