<?php
    include "../Model/Cliente_Model.php";
    include "../Banco/Conexao.php";

    session_start();
	
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

        function cadastrar($nome, $contato, $cpf, $email, $user, $senha, $img){
            $this->dados->setNome($this->dados->clear_string($nome));
            $this->dados->setContato($this->dados->clear_string($contato));
            $this->dados->setCpf($this->dados->clear_string($cpf));
            $this->dados->setEmail($this->dados->clear_string($email));
            $this->dados->setUser($this->dados->clear_string($user));
            $this->dados->setSenha($this->dados->clear_string($senha));
            $this->dados->setFotoPerfil($this->dados->clear_string($img));
            
            $sql = "insert into cliente (nome, contato, cpf, email, user, senha, img_perfil) values (:nome, :contato, :cpf, :email, :user, :senha, :img_perfil);";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":nome", $this->dados->getNome());
            $dados->bindValue(":contato", $this->dados->getContato());
            $dados->bindValue(":cpf", $this->dados->getCpf());
            $dados->bindValue(":email", $this->dados->getEmail());
            $dados->bindValue(":user", $this->dados->getUser());
            $dados->bindValue(":senha", $this->dados->getSenha());
            $dados->bindValue(":img_perfil", $this->dados->getFotoPerfil());

            try {
                $dados->execute();
                return true;
            } catch (PDOException $e){
                echo "Erro ao cadastrar: ". $e->getMessage();
                $_SESSION['cliente_nao_cadastrado'] = true;
                return false;
            }
        }

        function logar($user, $senha){
            $this->dados->setUser($user);
            $this->dados->setSenha($senha);

            $sql = "select cliente_id, user, nome from cliente where user = :user and senha = :senha;";

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

                header('Location: ../View/cliente/index.php');
            }
        }

        function atualizar($nome, $contato, $cpf, $email, $user, $senha, $cliente_id, $img){
            $this->dados->setNome($this->dados->clear_string($nome));
            $this->dados->setContato($this->dados->clear_string($contato));
            $this->dados->setCpf($this->dados->clear_string($cpf));
            $this->dados->setEmail($this->dados->clear_string($email));
            $this->dados->setUser($this->dados->clear_string($user));
            $this->dados->setSenha($this->dados->clear_string($senha));
            $this->dados->setClienteId($this->dados->clear_string($cliente_id));
            $this->dados->setFotoPerfil($this->dados->clear_string($img));

            $sql = "update cliente set nome = :nome, contato = :contato, cpf = :cpf, email = :email, user = :user, senha = :senha, img_perfil = :foto_perfil where cliente_id = :cliente_id;";
            $d = $this->conexao->Conectar();
            $dados = $d->prepare($sql);
            $dados->bindValue(":nome", $this->dados->getNome());
            $dados->bindValue(":contato", $this->dados->getContato());
            $dados->bindValue(":cpf", $this->dados->getCpf());
            $dados->bindValue(":email", $this->dados->getEmail());
            $dados->bindValue(":user", $this->dados->getUser());
            $dados->bindValue(":senha", $this->dados->getSenha());
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());
            $dados->bindValue(":foto_perfil", $this->dados->getFotoPerfil());

            try {
                $dados->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro ao atualizar: " . $e->getMessage();
                $_SESSION['cliente_nao_editado'] = true;
                return false;
            }
            header("Location: ");
        }
        
        function deletar($cliente_id){
            $this->dados->setClienteId($cliente_id);

            $d = $this->conexao->Conectar();

            $sql = "delete from cliente where cliente_id = :cliente_id;";

            $dados = $d->prepare($sql);
            $dados->bindValue(":cliente_id", $this->dados->getClienteId());

            try {
                $dados->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro ao apagar " . $e->getMessage();
                return false;
                $_SESSION['cliente_nao_excluido'] = true;
            }
        }
    }


    @$acao = $_REQUEST['acao'];
    
    if($acao == "cadastrar"){
        $nome = $_POST['campo_nome'];
        $contato = $_POST['campo_contato'];
        $email = $_POST['campo_email'];
        $cpf = $_POST['campo_cpf'];
        $user = $_POST['campo_user'];
        $senha = $_POST['campo_senha'];
        $img = 'icons-user.png';

        echo $nome."<br>";
        echo $contato."<br>";
        echo $email."<br>";
        echo $user."<br>";
        echo $senha."<br>";

        
        $vendedor = new Cliente_Control();

        if($vendedor->cadastrar($nome, $contato, $cpf, $email, $user, $senha, $img)){
            $_SESSION['user_cadastrado'] = true;
        }

        header('Location: ../View/cadastro.php');
    }else if($acao == "logar"){
        echo "teste<br>";
        $user = $_POST['campo_usuario'];
        $senha = $_POST['campo_senha'];

        $vendedor = new Cliente_Control();

        $vendedor->logar($user, $senha);
    }
?>