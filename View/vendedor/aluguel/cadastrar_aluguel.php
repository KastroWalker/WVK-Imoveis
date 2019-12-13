<?php 
    include "../../../Control/Aluguel_Control.php";

    $acao = $_REQUEST['acao'];

    if($acao == "cadastrar"){
        $data_inicial = $_POST['data_inicial'];
        $data_final = $_POST['data_final'];
        $imovel = $_POST['id_imovel'];
        $cpf_cliente = $_POST['cpf_cliente'];
        #$valor = $_POST['valor'];
        $valor = 220;
        $vendedor_id = $_SESSION['vendedor_id'];
        $alugel = new Aluguel_Control();
        $cliente_id = $alugel->retornaIdCliente($cpf_cliente);
        $id_cliente = 0;
        foreach ($cliente_id as $c) {
            $GLOBALS['id_cliente'] = $c['cliente_id'];
        }
        
        if($alugel->cadastrar($data_inicial, $data_final, $valor, $vendedor_id, $id_cliente, $imovel)){
            $alugel->mudaStatus($imovel, 1);
            $_SESSION['aluguel_cadastrado'] = true;
            echo "certo";
        }
        header('Location: cadastra_aluguel.php');
    }
?>