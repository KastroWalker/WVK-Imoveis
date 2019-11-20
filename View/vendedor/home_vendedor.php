<?php 
    include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>WVK Imóveis</title>

    <link href="../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
    <h1 style="text-align: center;">WVK Imóveis</h1>
    <div class="d-flex" id="wrapper">
        <?php 
            slideBar("home_vendedor.php", "clientes/clientes.php", "aluguel/aluguel.php", "imoveis/imoveis.php", "usuario/usuario.php", "../../Control/logout.php");
        ?>

        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                    #menu("Informações" ,"informacoes.php", "Editar" , "editar.php");
                ?>
            </header>
            <div class="container-fluid">
                <h2>
                    <?php 
                        mostra_turno();
                        echo " Seja Bem vindo(a) Victor!";
                    ?>
                </h2>
                <h3>O que deseja fazer?</h3>
                <ul>
                    <li>Ver <a href="clientes/clientes.php">Clientes</a></li>
                    <li>Ver <a href="aluguel/aluguel.php">Alugueis</a></li>
                    <li>Ver <a href="imoveis/imoveis.php">Imóveis</a></li>
                    <li>Ver <a href="usuario/usuario.php">Minha Conta</a></li>
                    <li>Ver <a href="../../Control/logout.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>

    <footer style="text-align: center;">
        <script src="../../lib/js/jquery.js"></script>
        <script src="../../lib/js/bootstrap/bootstrap.min.js"></script>
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
