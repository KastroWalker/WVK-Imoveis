<?php
<<<<<<< HEAD
    include "../../../Model/Cliente_Model.php";
    include "../../../Banco/Conexao.php";

    session_start();
	
=======
    include ("../../../Model/Cliente_Model.php");
    include ("../../../Banco/Conexao.php");
>>>>>>> 175385179c5fe50a69a9ad12d522f6d2bfb85e9c
    class Cliente_Control{
        private $dados;
        private $conexao;

        function __construct(){
            $this->dados = new Cliente_Model();
            $this->conexao = new Conexao();
        }

        function verDados(){
            $sql = "select * from cliente;";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->execute();
            return $dados;
        }

        function cadastrar($nome, $contato, $cpf, $email, $user, $senha){
            $this->dados->setNome($nome);
            $this->dados->setContato($contato);
            $this->dados->setCpf($cpf);
            $this->dados->setEmail($email);
            $this->dados->setUser($user);
            $this->dados->setSenha($senha);
            
            $sql = "insert into cliente (nome, contato, cpf, email, user, senha) values (:nome, :contato, :cpf, :email, :user, :senha);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":nome", $this->dados->getNome());
            $dados->bindValue(":contato", $this->dados->getContato());
            $dados->bindValue(":cpf", $this->dados->getCpf());
            $dados->bindValue(":email", $this->dados->getEmail());
            $dados->bindValue(":user", $this->dados->getUser());
            $dados->bindValue(":senha", $this->dados->getSenha());

            try {
                $dados->execute();
                return true;
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e->getMessage();
                $_SESSION['cliente_nao_cadastrado'] = true;
                return false;
            }
        }

        function atualizar($nome, $contato, $cpf, $email, $cliente_id){
            $this->dados->setNome($nome);
            $this->dados->setContato($contato);
            $this->dados->setCpf($cpf);
            $this->dados->setEmail($email);
            $this->dados->setClienteId($cliente_id);

            $sql = "update cliente set nome = :nome, contato = :contato, cpf = :cpf, email = :email where cliente_id = :cliente_id);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":nome", $this->dados->getNome());
            $dados->bindValue(":contato", $this->dados->getContato());
            $dados->bindValue(":cpf", $this->dados->getCpf());
            $dados->bindValue(":email", $this->dados->getEmail());
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());

            try {
                $dados->execute();
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
            }
<<<<<<< HEAD
            header("Location: ");
=======
        }
        
        function deletar($cliente_id){
            $this->dados->setClienteId($cliente_id);

            $d = $this->conexao->Conectar();

            $sql = "delete * from cliente where cliente_id = :cliente_id";

            $dados = $d->prepare($sql);
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());

            try {
                $dados->execute();
            } catch (PDOException $e) {
                echo "Erro ao apagar " . $e->getMessage();
            }
>>>>>>> 175385179c5fe50a69a9ad12d522f6d2bfb85e9c
        }
    }
?>