<?php
    include '../menu.php';
    include '../../../Control/Cliente_Control.php';

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

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <h1 style="text-align: center;">WVK Imóveis</h1>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../home_vendedor.php", "clientes.php", "../aluguel/aluguel.php", "../imoveis/imoveis.php", "../usuario/usuario.php", "../../../Control/logout.php");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Clientes", "clientes.php", "Cadastrar", "cadastra_cliente.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_clientes">
                    <h2 style="text-align: center;">Clientes</h2>
                    <table class="table table-condensed table-striped table-bordered table-hover">
                        <tr>
                            <th>Indice</th>
                            <th>Nome</th>
                            <th>Contato</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        <?php
                        $x = 1;
                        foreach ($dados as $d) {
                            echo "<tr>";
                            echo "<td>".$x."</td>";
                            #echo "<td>".$d['cliente_id']."</td>";
                            echo "<td>".$d['nome']."</td>";
                            echo "<td>".$d['contato']."</td>";
                            echo "<td>".$d['email']."</td>";
                            echo "<td>".$d['user']."</td>";
                            echo "</tr>";
                            $x++;
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