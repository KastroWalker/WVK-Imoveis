<?php
    include '../menu.php';

    $icons = array('../../../img/menu_icon/icon-client-20.png', '../../../img/menu_icon/icon-rent-20.png', '../../../img/menu_icon/icon-home-20.png', '../../../img/menu_icon/icon-user-20.png', '../../../img/menu_icon/icon-exit-20.png');
    #$icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');

    include '../../../Control/Aluguel_Control.php';
    $obj_aluguel = new Aluguel_Control();
    $dados = $obj_aluguel->verDados();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>Aluguel - WVK Imóveis</title>

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp", $icons,"../home_vendedor.php", "../clientes/clientes.php", "aluguel.php", "../imoveis/imoveis.php", "../usuario/usuario.php", "../../../Control/Vendedor_Control.php?acao=logout");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Aluguel", "aluguel.php", "Cadastrar", "#");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_aluguel">
                    <h2 style="text-align: center;">Aluguel</h2>
                    <table class="table table-hover">
                        <tr>
                            <th>Indice</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                            <th>Imovel</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                        </tr>
                        <?php
                            foreach ($dados as $d) {
                                echo "<tr>";
                                echo "<td>".$d['aluguel_id']."</td>";
                                echo "<td>".$d['data_inicial']."</td>";
                                echo "<td>".$d['data_final']."</td>";
                                echo "<td>".$d['imovel_id']."</td>";
                                echo "<td>".$d['cliente_id']."</td>";
                                echo "<td>".$d['vendedor_id']."</td>";
                                echo "</tr>";

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