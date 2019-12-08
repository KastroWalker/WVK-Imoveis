<?php 
	class Aluguel_Model{
		private $aluguel_id;
		private $data_inicial;
		private $data_final;
		private $valor_aluguel;
		private $vendedor_id;
		private $cliente_id;
		private $imovel_id;

		function __contruct(){
			$this->aluguel_id = 0;
			$this->data_inicial = "sem data";
			$this->data_final = "sem data";
			$this->valor_aluguel = 0;
			$this->vendedor_id = 0;
			$this->cliente_id = 0;
			$this->imovel_id = 0;
		}

		public function getAluguel_id(){
		    return $this->aluguel_id;
		}
		
		public function setAluguel_id($aluguel_id){
		    return $this->aluguel_id = $aluguel_id;
		}

		public function getDataInicial(){
		    return $this->data_inicial;
		}
		
		public function setDataInicial($data_inicial){
		    return $this->data_inicial = $data_inicial;
		}

		public function getDataFinal(){
		    return $this->data_final;
		}
		
		public function setDataFinal($data_final){
		    return $this->data_final = $data_final;
		}

		public function getValorAluguel(){
		    return $this->valor_aluguel;
		}
		
		public function setValorAluguel($valor_aluguel){
		    return $this->valor_aluguel = $valor_aluguel;
		}

		public function getVendedorId(){
		    return $this->vendedor_id;
		}
		
		public function setVendedorId($vendedor_id){
		    return $this->vendedor_id = $vendedor_id;
		}

		public function getClienteId(){
		    return $this->cliente_id;
		}
		
		public function setClienteId($cliente_id){
		    return $this->cliente_id = $cliente_id;
		}

		public function getImovelId(){
		    return $this->imovel_id;
		}
		
		public function setImovelId($imovel_id){
		    return $this->imovel_id = $imovel_id;
		}

		public function clear_string($string){
        	$var = trim($var);
        	$var = htmlspecialchars($string);
        	return $var;
    	}
	}
?>