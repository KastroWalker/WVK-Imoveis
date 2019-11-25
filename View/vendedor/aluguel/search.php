<?php 
    include '../../../Banco/Conexao.php';
    $conexao = new Conexao();
    $d = $conexao->Conectar();
    if(isset($_GET['term'])){
        $result = array();

        #$stmt = $d->prepare('SELECT nome, cpf FROM cliente WHERE cpf LIKE :term');
        $stmt = $d->prepare('select nome, cpf from cliente where cpf like :term');

        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $stmt->fetch()) {
            $result[] = $row['cpf'];
        }
    }

    echo json_encode($result);
?>