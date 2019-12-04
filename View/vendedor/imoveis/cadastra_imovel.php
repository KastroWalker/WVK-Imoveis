<?php 
    include '../menu.php';
    session_start();
    $icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');
    $id_vendedor = $_SESSION['vendedor_id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>Imóveis - WVK Imóveis</title>

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
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
            slideBar("../../../img/icon.webp", $icons, "../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "imoveis.php", "../usuario/usuario.php", "../../../Control/logout.php");
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
                <div id="div_cadastro_clientes">
                    <h2 style="text-align: center;">Cadastro Imóvel</h2>
                    <?php 
                        if(isset($_SESSION['imovel_cadastrado'])){
                            echo "
                                <div class='alert alert-success text-center'>
                                    Imóvel Cadastrado com Sucesso!<br/>
                                    Clique <a href='imoveis.php'><strong>aqui</strong></a> para ver os Imóveis!
                                </div>
                            ";
                        }
                        unset($_SESSION['imovel_cadastrado']);
                        if(isset($_SESSION['imovel_nao_cadastrado'])){
                            echo "
                                <div class='alert alert-danger text-center'>
                                    Erro ao cadastrar o Imóvel!
                                </div>
                            ";
                        }
                        unset($_SESSION['imovel_nao_cadastrado']);
                    ?>
                    <form method="POST" action="cadastrar_imovel.php?acao=cadastrar">
                        <input type="hidden" value="<?php echo $id_vendedor; ?>" name="campo_id" id="id">
                        <div class="form-group">
                            <label for="endereco">Endereço: *</label>
                            <input type="text" name="campo_endereco" id="endereco" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="numero">Número: *</label>
                            <input type="number" name="campo_numero" id="numero" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro: *</label>
                            <input type="text" name="campo_bairro" id="bairro" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP: *</label>
                            <input type="text" name="campo_cep" id="cep" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento: *</label>
                            <input type="text" name="campo_complemento" id="complemento" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor: *</label>
                            <input type="number" name="campo_valor" id="valor" class="form-control">
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