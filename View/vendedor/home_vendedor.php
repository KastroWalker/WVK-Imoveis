<?php 
    include 'menu.php';
    session_start();
    $nome_vendedor = $_SESSION['nome_vendedor'];
    $id_vendedor = $_SESSION['vendedor_id'];
    $icons = array('../../img/menu_icon/icon-client-20.png', '../../img/menu_icon/icon-rent-20.png', '../../img/menu_icon/icon-home-20.png', '../../img/menu_icon/icon-user-20.png', '../../img/menu_icon/icon-exit-20.png');
    #$icons = array('../../img/menu_icon/icon-client.png', '../../img/menu_icon/icon-rent.png', '../../img/menu_icon/icon-home.png', '../../img/menu_icon/icon-user-male.png', '../../img/menu_icon/icon-exit.png');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>WVK Imóveis</title>

    <link rel="icon" href="../../img/icon.webp" type="image/x-icon" />

    <link href="../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
        .text_card{
            padding-top: 15px; 
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php 
            slideBar("../../img/icon.webp", $icons,"home_vendedor.php", "clientes/clientes.php", "aluguel/aluguel.php", "imoveis/imoveis.php", "usuario/usuario.php", "../../Control/logout.php");
        ?>

        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                    <button class="btn btn-secondary" id="menu-toggle">Menu</button>
                </nav>
            </header>
            <div class="container-fluid">
                <h2 class="d-flex justify-content-center" style="margin-top: 15px;">
                    <?php 
                        mostra_turno();
                        echo " Seja Bem vindo(a) $nome_vendedor !";
                    ?>
                </h2>
                <h3 class="d-flex justify-content-center">O que deseja fazer?</h3>
                <div style="margin-top: 30px;">
                    <div class="card-deck d-flex justify-content-center">
                        <div class="card border-warning mb-4" style="max-width: 30rem;">
                            <div class="card-header bg-warning">Imóveis</div>
                            <div class="card-body">
                                <img src="../../img/home_vendedor/icon-home.png">
                                <p class="card-text text_card">Veja aqui as informações dos Imóveis na plataforma.</p>
                                <button class="btn btn-warning">Ver Imóveis!</button>
                            </div>
                        </div>
                        <div class="card border-primary mb-4" style="max-width: 30rem;">
                            <div class="card-header bg-primary">Clientes</div>
                            <div class="card-body">
                                <img src="../../img/home_vendedor/icon-client-management.png">
                                <p class="card-text text_card">Veja aqui as informações dos Clientes na plataforma.</p>
                                <button class="btn btn-primary">Ver Clientes!</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-deck d-flex justify-content-center">
                        <div class="card border-info mb-4" style="max-width: 30rem;">
                            <div class="card-header bg-info">Usuário</div>
                            <div class="card-body">
                                <img src="../../img/home_vendedor/icon-user.png">
                                <p class="card-text text_card">Veja aqui as informações do seu Usuário.</p>
                                <button class="btn btn-info">Ver Usuário!</button>
                            </div>
                        </div>
                        <div class="card border-success mb-4" style="max-width: 30rem;">
                            <div class="card-header bg-success">Alugueis</div>
                            <div class="card-body">
                                <img src="../../img/home_vendedor/icon-rent.png">
                                <p class="card-text text_card">Veja aqui as informações dos alugueis na plataforma.</p>
                                <button class="btn btn-success">Ver Alugueis!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="text-align: center; color: white;" class="bg-dark border-bottom">
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
        $('.btn-info').click(function(){
            window.location.href = "usuario/usuario.php";
        });
        $('.btn-warning').click(function(){
            window.location.href = "imoveis/imoveis.php";
        });
        $('.btn-primary').click(function(){
            window.location.href = "clientes/clientes.php";
        });
        $('.btn-success').click(function(){
            window.location.href = "aluguel/aluguel.php";
        });
    </script>
</body>
</html>
