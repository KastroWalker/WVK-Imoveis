<?php
    include '../menu.php';
    include '../../../Control/Cliente_Control.php';
    #$icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');

    $icons = array('../../../img/menu_icon/icon-client-20.png', '../../../img/menu_icon/icon-rent-20.png', '../../../img/menu_icon/icon-home-20.png', '../../../img/menu_icon/icon-user-20.png', '../../../img/menu_icon/icon-exit-20.png');

    $obj_cliente = new Cliente_Control();

    $dados = $obj_cliente->verDados();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>Clientes - WVK Imóveis</title>

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp", $icons, "../home_vendedor.php", "clientes.php", "../aluguel/aluguel.php", "../imoveis/imoveis.php", "../usuario/usuario.php", "../../../Control/Vendedor_Control.php?acao=logout");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Clientes", "clientes.php", "Cadastrar", "cadastra_cliente.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_clientes">
                    <h2 style="text-align: center;">Clientes</h2>
                    <table class="table table-hover">
                        <tr>
                            <th>Indice</th>
                            <th>Nome</th>
                            <th>Contato</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th colspan="2">Ações</th>
                        </tr>
                        <?php
                        $x = 1;
                        foreach ($dados as $d) {
                            echo "<tr>";
                            echo "<td>".$x."</td>";
                            #echo "<td>".$d['cliente_id']."</td>";
                            echo "<td>".$d['nome']."</td>";
                            echo "<td>".$d['contato']."</td>";
                            echo "<td>".$d['cpf']."</td>";
                            echo "<td>".$d['email']."</td>";
                            echo "<td><button class='btn btn-info'><img src='../../../img/icon_crud/icon-edit.png'></img></button></td>";
                            echo "<td><button class='btn btn-danger'><img src='../../../img/icon_crud/icon-delete.png'></img></button></td>";
                            echo "</tr>";
                            $x++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php 
        escreve_rodape();
    ?>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>