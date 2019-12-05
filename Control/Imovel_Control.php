<?php
    include "../../../Model/Imovel_Model.php";
    include "../../../Banco/Conexao.php";
    session_start();

	class Imovel_Control{
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

        function cadastrar($endereco, $numero, $bairro, $cep, $complemento, $valor_imovel, $status, $img){
            $this->dados->setEndereco($endereco);
            $this->dados->setNumero($numero);
            $this->dados->setBairro($bairro);
            $this->dados->setCep($cep);
            $this->dados->setComplemento($complemento);
            $this->dados->setValorImovel($valor_imovel);
            $this->dados->setStatus($status);
            $this->dados->setImgImovel($img);
            
            $sql = "insert into imovel (endereco, numero, bairro, cep, complemento, valor_imovel, status, img_imovel) values (:endereco, :numero, :bairro, :cep, :complemento, :valor_imovel, :status, :img);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":endereco", $this->dados->getEndereco());
            $dados->bindValue(":numero", $this->dados->getNumero());
            $dados->bindValue(":bairro", $this->dados->getBairro());
            $dados->bindValue(":cep", $this->dados->getCep());
            $dados->bindValue(":complemento", $this->dados->getComplemento());
            $dados->bindValue(":valor_imovel", $this->dados->getValorImovel());
            $dados->bindValue(":status", $this->dados->getStatus());
            $dados->bindValue(":img", $this->dados->getImgImovel());

            try {
                $dados->execute();
                return true;
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ".$e->getMessage();
                $_SESSION['imovel_nao_cadastrado'] = true;
                return false;
            }
        }

        function atualizar($endereco, $numero, $bairro, $cep, $complemento, $valor_imovel, $status, $vendedor_id, $imovel_id){
            $this->dados->setEndereco($endereco);
            $this->dados->setNumero($numero);
            $this->dados->setBairro($bairro);
            $this->dados->setCep($cep);
            $this->dados->setComplemento($complemento);
            $this->dados->setValorImovel($valor_imovel);
            $this->dados->setStatus($status);
            $this->dados->setVendedorId($vendedor_id);
            $this->dados->setImovelId($imovel_id);
            
            $d = $this->conexao->Conectar();
            
            $sql = "update imovel set endereco = :endereco, numero = :numero, bairro = :bairro, cep = :cep, complemento = :complemento, valor_imovel = :valor_imovel, status=:status, vendedor_id = :vendedor_id where imovel_id = :imovel_id;";

            $dados = $d->prepare($sql);

            $dados->bindValue(":endereco", $this->dados->getEndereco());
            $dados->bindValue(":numero", $this->dados->getNumero());
            $dados->bindValue(":bairro", $this->dados->getBairro());
            $dados->bindValue(":cep", $this->dados->getCep());
            $dados->bindValue(":complemento", $this->dados->getComplemento());
            $dados->bindValue(":valor_imovel", $this->dados->getValorImovel());
            $dados->bindValue(":valor_imovel", $this->dados->getStatus());
            $dados->bindValue(":vendedor_id", $this->dados->getVendedorId());
            $dados->bindValue(":imovel_id", $this->dados->getImovelId());

            try {
                $dados->execute();
            } catch (PDOException $e) {
                echo "Erro ao atualizar ".$e->getMessage();
            }
        }

        function deletar($imovel_id){
            $this->dados->setImovelId($imovel_id);

            $d = $this->conexao->Conectar();

            $sql = "delete * from imovel where imovel_id = :imovel_id";

            $dados = $d->prepare($sql);
            $dados->bindValue(":imovel_id", $this->dados->getImovelId());

            try {
                $dados->execute();
            } catch (PDOException $e) {
                echo "Erro ao apagar " . $e->getMessage();
            }
        }

        function escreve_imovel($img, $endereco, $numero, $cep, $status, $indice, $x){
            if ($status == '1') {
                $status_imovel = "Ocupado";
            }else{
                $status_imovel = "Desocupado";
            }

            $string = "
                    <div class='card border-info mb-3' style='max-width: 35rem;'>
                        <div class='card-header bg-info'>Imóvel $indice</div>
                        <div class='card-body'>
                            <img src='../../../img/imoveis/$img' style='width: 260px; height: 260px;'>
                            <div class='card-text text_card' style='margin-top: 15px;'>
                                <strong>Status: </strong>
                                <p class='$status_imovel'>$status_imovel</p>
                            </div>
                            <div class='card-text text_card'>
                                <strong>Endereço: </strong>
                                <p>$endereco</p>
                            </div>
                            <div class='card-text text_card'>
                                <strong>Número: </strong>
                                <p>$numero</p>
                            </div>
                            <div class='card-text text_card'>
                                <strong>Cep: </strong>
                                <p>$cep</p>
                            </div>
                        </div>
                    </div>
            ";
            if($indice == 1){
                echo "<div class='card-deck d-flex justify-content-center'>";   
            }else if($indice % 4 == 0){
                echo "</div>";
                echo "<div class='card-deck d-flex justify-content-center'>";   
            }
            echo $string;
        }
    }
?>
