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
            $this->dados->setImovelId($valor_imovel);
            $this->dados->setVendedorId($vendedor_id);
            
            $sql = "insert into imovel (endereco, numero, bairro, cep, complemento, valor_imovel, vendedor_id) values (:endereco, :numero, :bairro, :cep, :complemento, :valor_imovel, :vendedor_id);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":endereco", $endereco);
            $dados->bindValue(":numero", $numero);
            $dados->bindValue(":bairro", $bairro);
            $dados->bindValue(":cep", $cep);
            $dados->bindValue(":complemento", $complemento);
            $dados->bindValue(":valor_imovel", $valor_imovel);
            $dados->bindValue(":vendedor_id", $vendedor_id);

            try {
                $dados->execute();
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
            }
            header("Location: ");
        }
    }
?>