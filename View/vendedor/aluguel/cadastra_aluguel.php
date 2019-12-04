<?php 
    include '../menu.php';
    include('../../../Control/Imovel_Control.php');
    $obj_imovel = new Imovel_Control();
    $dados = $obj_imovel->verDados();
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

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />

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
            slideBar("../../../img/icon.webp", "../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "../imoveis/imoveis.php", "usuario.php", "../../../Control/logout.php");
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
                    <?php 
                        if(isset($_SESSION['aluguel_cadastrado'])){
                            echo "
                                <div class='alert alert-success text-center'>
                                    Aluguel Cadastrado com Sucesso!<br/>
                                    Clique <a href='aluguel.php'><strong>aqui</strong></a> para ver os Alugueis!
                                </div>
                            ";
                        }
                        unset($_SESSION['aluguel_cadastrado']);
                        if(isset($_SESSION['aluguel_nao_cadastrado'])){
                            echo "
                                <div class='alert alert-danger text-center'>
                                    Erro ao cadastrar o Aluguel!
                                </div>
                            ";
                        }
                        unset($_SESSION['aluguel_nao_cadastrado']);
                    ?>
                    <form method="POST" action="cadastrar_aluguel.php?acao=cadastrar">
                        <div class="form-group">
                            <label for="data_inicial">Data Inicial: *</label>
                            <input type="date" class="form-control" id="data_inicial" name="data_inicial">
                        </div>
                        <div class="form-group">
                            <label for="data_final">Data Final: *</label>
                            <input type="date" class="form-control" id="data_final" name="data_final">
                        </div>
                        <div class="form-group">
                            <label for="id_imovel">Imovel: *</label>
                            <!--input type="number" class="form-control" id="id_imovel" name="imovel"-->
                            <select name="imovel" id="id_imovel" class="form-control">
                                <?php 
                                    foreach ($dados as $d) {
                                        echo "<option value='".$d['imovel_id']."'>";
                                        echo $d['endereco']." Nº: ".$d['numero']."CEP: ".$d['cep'];
                                        echo "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_cliente">CPF Cliente: *</label>
                            <input type="text" class="form-control auto" id="id_cliente" name="cpf_cliente">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor: </label>
                            <input type="number" class="form-control" id="valor" name="valor">
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