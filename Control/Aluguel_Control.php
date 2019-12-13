<?php
    include "../../../Model/Aluguel_Model.php";
    include "../../../Model/Cliente_Model.php";
    include "../../../Banco/Conexao.php";
    
    session_start();
    
    class Aluguel_Control{
        private $dados;
        private $dados_cliente;
        private $conexao;

        function __construct(){
            $this->dados = new Aluguel_Model();
            $this->dados_cliente = new Cliente_Model();
            $this->conexao = new Conexao();
        }

        function verDados(){
            $sql = "select * from aluguel;";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->execute();
            return $dados;
        }

        function retornaIdCliente($cpf){
            $this->dados_cliente->setCpf($cpf);
            $sql = "select cliente_id from cliente where cpf = :cpf";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":cpf", $this->dados_cliente->getCpf());
            try{
                $dados->execute();
                return $dados;
            }catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e->getMessage();
                return false;
            }
        }

        function mudaStatus($id, $status){
            $d = $this->conexao->Conectar();

            $sql = "update imovel set status = :status where imovel_id = :id";
            $dados = $d->prepare($sql);
            $dados->bindValue(":id", $id);
            $dados->bindValue(":status", $status);

            $dados->execute();
        }

        function cadastrar($data_inicial, $data_final, $valor_aluguel, $vendedor_id, $cliente_id, $imovel_id){

            $this->dados->setDataInicial($this->dados->clear_string($data_inicial));
            $this->dados->setDataFinal($this->dados->clear_string($data_final));
            $this->dados->setValorAluguel($this->dados->clear_string($valor_aluguel));
            $this->dados->setVendedorId($this->dados->clear_string($vendedor_id));
            $this->dados->setClienteId($this->dados->clear_string($cliente_id));
            $this->dados->setImovelId($this->dados->clear_string($imovel_id));
            
            $sql = "insert into aluguel (data_inicial, data_final, valor_aluguel, vendedor_id, cliente_id, imovel_id) values (:data_inicial, :data_final, :valor_aluguel, :vendedor_id, :cliente_id, :imovel_id);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":data_inicial", $this->dados->getDataInicial());
            $dados->bindValue(":data_final", $this->dados->getDataFinal());
            $dados->bindValue(":valor_aluguel", $this->dados->getValorAluguel());
            $dados->bindValue(":vendedor_id", $this->dados->getVendedorId());
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());
            $dados->bindValue(":imovel_id", $this->dados->getImovelId());

            try {
                $dados->execute();
                return true;
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e->getMessage();
                $_SESSION['aluguel_nao_cadastrado'] = true;
                return false;
            }
        }

        function atualizar($data_inicial, $data_final, $valor_aluguel, $vendedor_id, $cliente_id, $imovel_id, $aluguel_id){
            $this->dados->setDataInicial($this->dados->clear_string($data_inicial));
            $this->dados->setDataFinal($this->dados->clear_string($data_final));
            $this->dados->setValorAluguel($this->dados->clear_string($valor_aluguel));
            $this->dados->setVendedorId($this->dados->clear_string($vendedor_id));
            $this->dados->setClienteId($this->dados->clear_string($cliente_id));
            $this->dados->setImovelId($this->dados->clear_string($imovel_id));
            $this->dados->setAluguelId($this->dados->clear_string($aluguel_id));

            $sql = "update aluguel set data_inicial = :data_inicial, data_final = :data_final, valor_aluguel = :valor_aluguel, vendedor_id = :vendedor_id, cliente_id = :cliente_id, imovel_id = :imovel_id where aluguel_id = :aluguel_id);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":data_inicial", $this->dados->getNome());
            $dados->bindValue(":data_final", $this->dados->getDataFinal());
            $dados->bindValue(":valor_aluguel", $this->dados->getValorAluguel());
            $dados->bindValue(":vendedor_id", $this->dados->getVendedorId());
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());
            $dados->bindValue(":imovel_id", $this->dados->getImovelId());
            $dados->bindValue(":aluguel_id", $this->dados->getAluguelId());

            try {
                $dados->execute();
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
            }
        }

        function deletar($aluguel_id){
            $this->dados->setAluguelId($aluguel_id);
            
            $d = $this->conexao->Conectar();
            
            $sql = "delete * from aluguel where aluguel_id = :aluguel_id";

            $dados = $d->prepare($sql);
            $dados->bindValue(":aluguel_id", $this->dados->getAluguelId());

            try {
                $dados->execute();
            } catch (PDOException $e) {
                echo "Erro ao apagar ".$e->getMessage();
            }
        }
    }
?>