<?php
    include "../../../Control/Imovel_Control.php";
    @$acao = $_REQUEST['acao'];

    if($acao == "cadastrar"){
        echo "chamou";
        $endereco = $_POST['campo_endereco'];
        $numero = $_POST['campo_numero'];
        $bairro = $_POST['campo_bairro'];
        $cep = $_POST['campo_cep'];
        $complemento = $_POST['campo_complemento'];
        $valor_imovel = $_POST['campo_valor'];
        $status = 0;
        $vendedor_id = $_POST['campo_id'];
    
        $imovel = new Imovel_Control();

        if($imovel->cadastrar($endereco, $numero, $bairro, $cep, $complemento, $valor_imovel, $status, $vendedor_id)){
            $_SESSION['imovel_cadastrado'] = true;
        }
        header("Location: cadastra_imovel.php");
    }

?>