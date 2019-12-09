<?php
    include "../../../Control/Cliente_Control.php";

    @$acao = $_REQUEST['acao'];

    if($acao == "cadastrar"){
        $nome_cliente = $_POST['campo_nome'];
        $contato = $_POST['campo_contato'];
        $cpf = $_POST['campo_cpf'];
        $email = $_POST['campo_email'];
        $user = $_POST['campo_usuario'];
        $senha = $_POST['campo_senha'];

        if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];
         
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
         
            $extensao = strtolower ( $extensao );
         
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $img = uniqid ( time () ) . '.' . $extensao;
         
                $destino = '../../../img/perfil_clientes/' . $img;
                echo "<b>Nome: </b>".$img;
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                    echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                }else{
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
                    $_SESSION['sem_permisao'] = true;
                }
            }else{
                echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
                $_SESSION['formato_nulo'] = true;
            }
        }else{
            echo 'Você não enviou nenhum arquivo!';
            $img = 'icon-user-padrao.png';
            $_SESSION['sem_arquivo'] = true;
        }

        $cliente = new Cliente_Control();

        if($cliente->cadastrar($nome_cliente, $contato, $cpf, $email, $user, $senha, $img)){
            $_SESSION['cliente_cadastrado'] = true;
            echo "certo2";
        }

        header('Location: cadastra_cliente.php');
    }
?>