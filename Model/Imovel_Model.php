<?php 
    Class Imovel_Model{
        private $imovel_id;
        private $endereco;
        private $numero;
        private $bairro;
        private $cep;
        private $complemento;
        private $valor_imovel;
        private $status;
        private $vendedor_id;
        private $img_imovel;

        public function __construct(){
            $this->imovel_id = 0;
            $this->endereco = "null";
            $this->numero = "0";
            $this->bairro = "null";
            $this->cep = "000000";
            $this->complemento = "null";
            $this->valor_imovel = 0;
            $this->status = FALSE;
            $this->vendedor_id = 0;
            $this->img_imovel = "null";
        }

        public function getImovelId(){
            return $this->imovel_id;
        }
        public function setImovelId($imovel_id){
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

        public function getValorImovel(){
            return $this->valor_imovel;
        }  
        public function setValorImovel($valor_imovel){
            return $this->valor_imovel = $valor_imovel;
        }

        public function getVendedorId(){
            return $this->vendedor_id;
        }
        public function setVendedorId($vendedor_id){
            return $this->vendedor_id = $vendedor_id;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            return $this->status = $status;
        }

        public function getImgImovel(){
            return $this->img_imovel;
        }
        public function setImgImovel($img_imovel){
            return $this->img_imovel = $img_imovel;
        }

        public function clear_string($string){
            $var = trim($var);
            $var = htmlspecialchars($string);
            return $var;
        }
    }
?>