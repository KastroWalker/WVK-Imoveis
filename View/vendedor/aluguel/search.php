<?php 
    include '../../../Banco/Conexao.php';
    $conexao = new Conexao();
    $d = $conexao->Conectar();
    if(isset($_GET['term'])){
        $result = array();

        $stmt = $d->prepare('select nome, cpf from cliente where cpf like :term or nome like :term');

        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $stmt->fetch()) {
            $result[] = $row['cpf'];
        }
    }

    echo json_encode($result);
?>