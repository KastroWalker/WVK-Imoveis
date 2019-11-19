<?php
class Cliente_Model{
	private $cliente_id;
	private $nome;
	private $contato;
	private $cpf;
	private $email;
	private $user;
	private $senha;

	function __construct(){
		$this->cliente_id = 0;
		$this->nome = "null";
		$this->contato = "null";
		$this->cpf = "null";
		$this->email = "null";
		$this->user = "null";
		$this->senha = "null";
	}

	public function getClienteId(){
		return $this->cliente_id;
	}
	
	public function setClienteId($cliente_id){
		return $this->cliente_id = $cliente_id;
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

	public function getCpf(){
	    return $this->cpf;
	}
	
	public function setCpf($cpf){
	    return $this->cpf = $cpf;
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