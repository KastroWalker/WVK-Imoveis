<?php
    include "../../../Control/Cliente_Control.php";

    @$acao = $_REQUEST['acao'];

    if($acao == "cadastrar"){
        $nome = $_POST['campo_nome'];
        $contato = $_POST['campo_contato'];
        $cpf = $_POST['campo_cpf'];
        $email = $_POST['campo_email'];
        $user = $_POST['campo_usuario'];
        $senha = $_POST['campo_senha'];
    
        $cliente = new Cliente_Control();

        if($cliente->cadastrar($nome, $contato, $cpf, $email, $user, $senha)){
            $_SESSION['cliente_cadastrado'] = true;
            echo "certo2";
        }

        header('Location: cadastra_cliente.php');
    }
?>