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

    <title>Aluguel - WVK Imóveis</title>

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/jquery-ui.min.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">
    
    <style type="text/css">
        label{
            font-weight: bold;
        }

        #div_cadastro_clientes{
            width: 60%;
            margin: auto; 
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">WVK Imóveis</h1>
    <div class="d-flex" id="wrapper">
        <?php 
            slideBar("../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "../imoveis/imoveis.php", "usuario.php", "../../../Control/logout.php");
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
                <div id="div_cadastro_clientes">
                    <h2 style="text-align: center;">Cadastro Aluguel</h2>
                    <form method="POST" action="../../../Control/Aluguel_Control.php?acao=cadastrar">
                        <div class="form-group">
                            <label for="data_inicial">Data Inicial: *</label>
                            <input type="date" class="form-control" id="data_inicial">
                        </div>
                        <div class="form-group">
                            <label for="data_final">Data Final: *</label>
                            <input type="date" class="form-control" id="data_final">
                        </div>
                        <div class="form-group">
                            <label for="id_imovel">Imovel: *</label>
                            <input type="number" class="form-control" id="id_imovel">
                        </div>
                        <div class="form-group">
                            <label for="id_cliente">CPF Cliente: *</label>
                            <input type="text" class="form-control auto" id="id_cliente">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor: </label>
                            <input type="number" class="form-control" id="valor">
                        </div>
                        <div class="div_btns">
                            <button class="btn btn-success">Cadastrar</button>
                            <button class="btn btn-primary">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer style="text-align: center;">
        <script src="../../../lib/js/jquery.js"></script>
        <script src="../../../lib/js/jquery-ui.min.js"></script>
        <script src="../../../lib/js/bootstrap/bootstrap.min.js"></script>
        <h2>Direitos</h2>
        <p>2019 &copy; Copyright - Todos os direitos reservados | Tico && Teco.</p>
    </footer>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $(function() {
            $(".auto").autocomplete({
                source: "search.php",
                minLength: 3
            });             
        });
    </script>
</body>
</html>