<?php
    include ("../Model/Cliente_Model.php");
    include ("../Banco/Conexao.php");
	class Aluguel_Control{
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
            $dados->bindValue(":nome", $nome);
            $dados->bindValue(":contato", $contato);
            $dados->bindValue(":cpf", $cpf);
            $dados->bindValue(":email", $email);
            $dados->bindValue(":user", $user);
            $dados->bindValue(":senha", $senha);

            try {
                $dados->execute();
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
            }
            header("Location: ");
        }
    }
?>