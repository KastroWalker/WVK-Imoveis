<?php
    include ("../Model/Aluguel_Model.php");
    include ("../Banco/Conexao.php");
	class Aluguel_Control{
        private $dados;
        private $conexao;

        function __construct(){
            $this->dados = new Aluguel_Model();
            $this->conexao = new Conexao();
        }

        function verDados(){
            $sql = "select * from aluguel;";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->execute();
            return $dados;
        }

        function cadastrar($data_inicial, $data_final, $valor_aluguel, $vendedor_id, $cliente_id, $imovel_id){
            $this->dados->setDataInicial($data_inicial);
            $this->dados->setDataInicial($data_final);
            $this->dados->setValorAluguel($valor_aluguel);
            $this->dados->setVendedorId($vendedor_id);
            $this->dados->setClienteId($cliente_id);
            $this->dados->setImovelId($imovel_id);
            
            $sql = "insert into aluguel (data_inicial, data_final, valor_aluguel, vendedor_id, cliente_id, imovel_id) values (:data_inicial, :data_final, :valor_aluguel, :vendedor_id, :cliente_id, :imovel_id);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":data_inicial", $this->dados->getDataInicial());
            $dados->bindValue(":data_final", $this->dados->getDataFinal());
            $dados->bindValue(":valor_aluguel", $this->dados->getValorAluguel());
            $dados->bindValue(":vendedor_id", $this->dados->getVendedor_id());
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());
            $dados->bindValue(":imovel_id", $this->dados->getImovelId());

            try {
                $dados->execute();
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
            }
            header("Location: ");
        }
    }
    
?>