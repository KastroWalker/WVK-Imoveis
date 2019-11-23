<?php
    include ("../Model/Imovel_Model.php");
    include ("../Banco/Conexao.php");
	class Aluguel_Control{
        private $dados;
        private $conexao;

        function __construct(){
            $this->dados = new Imovel_Model();
            $this->conexao = new Conexao();
        }

        function verDados(){
            $sql = "select * from imovel;";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->execute();
            return $dados;
        }

        function cadastrar($endereco, $numero, $bairro, $cep, $complemento, $valor_imovel, $vendedor_id){
            $this->dados->setEndereco($endereco);
            $this->dados->setDataInicial($numero);
            $this->dados->setValorAluguel($bairro);
            $this->dados->setVendedorId($cep);
            $this->dados->setClienteId($complemento);
            $this->dados->setValorImovel($valor_imovel);
            $this->dados->setVendedorId($vendedor_id);
            
            $sql = "insert into imovel (endereco, numero, bairro, cep, complemento, valor_imovel, vendedor_id) values (:endereco, :numero, :bairro, :cep, :complemento, :valor_imovel, :vendedor_id);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":endereco", $this->dados->getEndereco());
            $dados->bindValue(":numero", $this->dados->getNumero());
            $dados->bindValue(":bairro", $this->dados->getBairro());
            $dados->bindValue(":cep", $this->dados->getCep());
            $dados->bindValue(":complemento", $this->dados->getComplemento());
            $dados->bindValue(":valor_imovel", $this->dados->getValorImovel());
            $dados->bindValue(":vendedor_id", $this->dados->getVendedorId());

            try {
                $dados->execute();
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
            }
            header("Location: ");
        }
    }
?>