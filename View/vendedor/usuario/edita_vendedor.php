<?php
include '../menu.php';
$icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>Usuário - WVK Imóveis</title>

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
    <h1 style="text-align: center;">WVK Imóveis</h1>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp", $icons, "../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "imoveis.php", "../usuario/usuario.php", "../../../Control/logout.php");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Usuário", "usuario.php", "Editar Informações", "edita_vendedor.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_usuario">
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