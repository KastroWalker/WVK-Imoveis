<?php
    include ("../Model/Vendedor_Model.php");
    include ("../Banco/Conexao.php");
	class Aluguel_Control{
        private $dados;
        private $conexao;

        function __construct(){
            $this->dados = new Vendedor_Model();
            $this->conexao = new Conexao();
        }

        function verDados(){
            $sql = "select * from vendedor;";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->execute();
            return $dados;
        }

        function cadastrar($nome, $contato, $email, $user, $senha){
            $this->dados->setNome($nome);
            $this->dados->setContato($contato);
            $this->dados->setEmail($email);
            $this->dados->setUser($user);
            $this->dados->setsenha($senha);
            
            $sql = "insert into vendedor (nome, contato, email, user, senha) values (:nome, :contato, :email, :user, :senha);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":nome", $this->dados->getNome());
            $dados->bindValue(":contato", $this->dados->getContato());
            $dados->bindValue(":email", $this->dados->getEmail());
            $dados->bindValue(":user", $this->dados->getUser());
            $dados->bindValue(":senha", $this->dados->getSenha());

            try {
                $dados->execute();
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
            }
            header("Location: ");
        }
    }
