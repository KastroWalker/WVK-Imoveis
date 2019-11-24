<?php
    include ("../Model/Vendedor_Model.php");
    include ("../Banco/Conexao.php");
	session_start();

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
            $this->dados->setSenha($senha);
            
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
                return true;
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e;
                $_SESSION['user_nao_cadastrado'] = true;
                return false;
            }
        }

        function logar($user, $senha){
            $this->dados->setUser($user);
            $this->dados->setSenha($senha);

            $sql = "select vendedor_id, user, nome from vendedor where user = :user and senha = :senha;";

            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":user", $this->dados->getUser());
            $dados->bindValue(":senha", $this->dados->getSenha());
            $dados->execute();
            
            $users = $dados->fetchAll();
            
            if(count($users) <= 0){
                $_SESSION['nao_cadastrado'] = true;

                header('Location: ../View/login.php');
            }else{
                $user = $users[0];

                $_SESSION['vendedor_id'] = $user['vendedor_id'];
                $_SESSION['nome_vendedor'] = $user['nome'];

                header('Location: ../View/vendedor/home_vendedor.php');
            }
        }
    }

    @$acao = $_REQUEST['acao'];
    
    if($acao == "cadastrar"){
        $nome = $_POST['campo_nome'];
        $contato = $_POST['campo_contato'];
        $email = $_POST['campo_email'];
        $user = $_POST['campo_user'];
        $senha = $_POST['campo_senha'];

        echo $nome."<br>";
        echo $contato."<br>";
        echo $email."<br>";
        echo $user."<br>";
        echo $senha."<br>";

        
        $vendedor = new Aluguel_Control();

        if($vendedor->cadastrar($nome, $contato, $email, $user, $senha)){
            $_SESSION['user_cadastrado'] = true;
        }

        header('Location: ../View/cadastro.php');
    }else if($acao == "logar"){
        echo "teste<br>";
        $user = $_POST['campo_usuario'];
        $senha = $_POST['campo_senha'];

        $vendedor = new Aluguel_Control();

        $vendedor->logar($user, $senha);
    }
