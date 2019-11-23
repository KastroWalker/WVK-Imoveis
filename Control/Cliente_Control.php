<?php
    include ("../../../Model/Cliente_Model.php");
    include ("../../../Banco/Conexao.php");
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
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
            }
            header("Location: ");
        }

    function atualizar($nome, $contato, $cpf, $email, $cliente_id){
        $this->dados->setNome($nome);
        $this->dados->setContato($contato);
        $this->dados->setCpf($cpf);
        $this->dados->setEmail($email);
        $this->dados->setClienteId($cliente_id);

        $sql = "update cliente set nome = :nome, contato = :contato, cpf = :cpf, email = :email);";
        $d = $this->conexao->Conectar();
        $dados = $d->prepare($sql);
        $dados->bindValue(":nome", $this->dados->getNome());
        $dados->bindValue(":contato", $this->dados->getContato());
        $dados->bindValue(":cpf", $this->dados->getCpf());
        $dados->bindValue(":email", $this->dados->getEmail());

        try {
            $dados->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e;
        }
        header("Location: ");
    }
    }
?>