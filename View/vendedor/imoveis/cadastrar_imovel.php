<?php
    include "../../../Control/Imovel_Control.php";
    @$acao = $_REQUEST['acao'];

    if($acao == "cadastrar"){
        #echo "chamou";
        $endereco = $_POST['campo_endereco'];
        $numero = $_POST['campo_numero'];
        $bairro = $_POST['campo_bairro'];
        $cep = $_POST['campo_cep'];
        $complemento = $_POST['campo_complemento'];
        $valor_imovel = $_POST['campo_valor'];
        $status = 0;
        $vendedor_id = $_POST['campo_id'];
    
        if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];
         
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
         
            $extensao = strtolower ( $extensao );
         
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $img = uniqid ( time () ) . '.' . $extensao;
         
                $destino = '../../../img/imoveis/' . $img;
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
            $img = 'nulo.png';
            $_SESSION['sem_arquivo'] = true;
        }

        $imovel = new Imovel_Control();

        if($imovel->cadastrar($endereco, $numero, $bairro, $cep, $complemento, $valor_imovel, $status, $img)){
            $_SESSION['imovel_cadastrado'] = true;
        }
        header("Location: cadastra_imovel.php");
    }

?>