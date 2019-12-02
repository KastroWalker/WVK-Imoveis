<?php
include '../menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>Imoveis - WVK Imóveis</title>

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
    <?php
        include('../../../Control/Imovel_Control.php');
        $obj_imovel = new Imovel_Control();
        $dados = $obj_imovel->verDados();
    ?>
    <h1 style="text-align: center;">WVK Imóveis</h1>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp","../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "imoveis.php", "../usuario/usuario.php", "../../../Control/logout.php");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Imoveis", "imoveis.php", "Cadastrar", "cadastra_imovel.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_aluguel">
                    <h2 style="text-align: center;">Imoveis</h2>
                    <table class="table table-condensed table-striped table-bordered table-hover">
                        <tr>
                            <th>Indice</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Cep</th>
                            <th>Status</th>
                            <th>Vendedor</th>
                        </tr>
                        <?php
                            foreach ($dados as $d) {
                                echo "<tr>";
                                echo "<td>".$d['imovel_id']."</td>";
                                echo "<td>".$d['endereco']."</td>";
                                echo "<td>".$d['numero']."</td>";
                                echo "<td>".$d['cep']."</td>";
                                echo "<td>".$d['status']."</td>";
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