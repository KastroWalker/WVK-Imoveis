<?php 
    Class Vendedor_Model{
        private $vendedor_id;
        private $nome;
        private $contato;
        private $email;
        private $user;
        private $senha;

        public function __construct(){
            $this->vendedor_id = 0;
            $this->nome = "null";
            $this->contato = "null";
            $this->email = "null";
            $this->user = "nulluser";
            $this->senha = "nullpass";
        }

        public function getVendedor_id(){
            return $this->vendedor_id;
        }
        public function setVendedor_id($vendedor_id){
            return $this->vendedor_id = $vendedor_id;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            return $this->nome = $nome;
        }

        public function getContato(){
            return $this->contato;
        }
        public function setContato($contato){
            return $this->contato = $contato;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            return $this->email = $email;
        }

        public function getUser(){
            return $this->user;
        }
        public function setUser($user){
            return $this->user = $user;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            return $this->senha = $senha;
        }
    }
?>