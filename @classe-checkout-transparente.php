<?php
    
    require_once "@classe-metodos-pagamento.php";

    class Checkout{
        public $pagseguro_folder;
        
        function __construct(){
            $this->pagseguro_folder = "../pagseguro/";
        }
        
        function set_pagseguro_session(){
            /*$response_file = "ws-pagseguro-set-session.php";
            require_once $this->pagseguro_folder.$response_file;
            return $responseSessionID;*/
        }
    }

    echo "teste";