<?php
include '../menu.php';
<<<<<<< HEAD
$icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');
=======
include '../../../Control/Aluguel_Control.php';
$obj_aluguel = new Aluguel_Control();
$dados = $obj_aluguel->verDados();
>>>>>>> a2808c1823c69e1c42eca9f7778cfbb30489a9f4
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
    <h1 style="text-align: center;">WVK Imóveis</h1>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp", $icons,"../home_vendedor.php", "../clientes/clientes.php", "aluguel.php", "../imoveis/imoveis.php", "../usuario/usuario.php", "../../../Control/logout.php");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Aluguel", "aluguel.php", "Cadastrar", "cadastra_aluguel.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_aluguel">
                    <h2 style="text-align: center;">Aluguel</h2>
                    <table class="table table-condensed table-striped table-bordered table-hover">
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

    <footer style="text-align: center;">
        <script src="../../../lib/js/jquery.js"></script>
        <script src="../../../lib/js/bootstrap/bootstrap.min.js"></script>
        <h2>Direitos</h2>
        <p>2019 &copy; Copyright - Todos os direitos reservados | Tico && Teco.</p>
    </footer>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>