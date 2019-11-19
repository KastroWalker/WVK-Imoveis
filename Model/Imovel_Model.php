<?php 
    Class Imovel{
        private $imovel_id;
        private $endereco;
        private $numero;
        private $bairro;
        private $cep;
        private $complemento;
        private $valor_imovel;
        private $vendedor_id;

        public function __construct(){
            $this->imovel_id = 0;
            $this->endereco = "null";
            $this->numero = "0";
            $this->bairro = "null";
            $this->cep = "000000";
            $this->complemento = "null";
            $this->valor_imovel = 0;
            $this->vendedor_id = 0;
        }

        public function getImovel_id(){
            return $this->imovel_id;
        }
        public function setImovel_id($imovel_id){
            return $this->imovel_id = $imovel_id;
        }

        public function getEndereco(){
            return $this->endereco;
        }
        public function setEndereco($endereco){
            return $this->endereco = $endereco;
        }

        public function getNumero(){
            return $this->numero;
        }
        public function setNumero($numero){
            return $this->numero = $numero;
        }

        public function getBairro(){
            return $this->bairro;
        }
        public function setBairro($bairro){
            return $this->bairro = $bairro;
        }

        public function getCep(){
            return $this->cep;
        }
        public function setCep($cep){
            return $this->cep = $cep;
        }

        public function getComplemento(){
            return $this->complemento;
        }
        public function setComplemento($complemento){
            return $this->complemento = $complemento;
        }

        public function getValor_imovel(){
            return $this->valor_imovel;
        }  
        public function setValor_imovel($valor_imovel){
            return $this->valor_imovel = $valor_imovel;
        }

        public function getVendedor_id(){
            return $this->vendedor_id;
        }
        public function setVendedor_id($vendedor_id){
            return $this->vendedor_id = $vendedor_id;
        }
    }
?>