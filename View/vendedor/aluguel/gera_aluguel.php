<?php 
    include '../menu.php';
    
    $imovel_id = $_REQUEST['id'];

    $icons = array('../../../img/menu_icon/icon-client-20.png', '../../../img/menu_icon/icon-rent-20.png', '../../../img/menu_icon/icon-home-20.png', '../../../img/menu_icon/icon-user-20.png', '../../../img/menu_icon/icon-exit-20.png');

    include('../../../Control/Imovel_Control.php');
    $obj_imovel = new Imovel_Control();
    $dados = $obj_imovel->verInfomacoes($imovel_id);

    $id_imovel = 'null';
    $endereco = 'null';
    $numero = 'null';
    $cep = 'null';
    $bairro = 'null';
    $complemento = 'null';
    $valor = 'null';

    foreach ($dados as $d) {
        $id_imovel = $d['imovel_id'];
        $endereco = $d['endereco'];
        $numero = $d['numero'];
        $cep = $d['cep'];
        $bairro = $d['bairro'];
        $complemento = $d['complemento'];
        $valor = $d['valor_imovel'];
    }
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

        #desabled{
            pointer-events:none;
            outline:none;
        }

        #div_info_imovel{
            display: none;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php 
            slideBar("../../../img/icon.webp", $icons, "../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "../imoveis/imoveis.php", "usuario.php", "../../../Control/Vendedor_Control.php?acao=logout");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
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
                        <input type="hidden" name="id_imovel" value="<?php echo $id_imovel; ?>">
                        <div class="form-group">
                            <label for="data_inicial">Data Inicial: *</label>
                            <input type="date" class="form-control" id="data_inicial" name="data_inicial">
                        </div>
                        <div class="form-group">
                            <label for="data_final">Data Final: *</label>
                            <input type="date" class="form-control" id="data_final" name="data_final">
                        </div>
                        <!--a href="#info_imoveis">informações imóveis</a-->
                        
                        <div ĩd="div_info_imovel">
                            <hr>
                            <legend>Informações Imóvel: </legend>
                            <div class="form-group">
                                <label for="">Endereço: </label>
                                <span><?php echo $endereco; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Número: </label>
                                <span><?php echo $numero; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Bairro: </label>
                                <span><?php echo $bairro; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Cep: </label>
                                <span><?php echo $cep; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Complemento: </label>
                                <span><?php echo $complemento; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Valor: </label>
                                <span>R$: <?php echo $valor; ?></span>
                            </div>
                            <hr>
                        </div>

                        <div class="form-group">
                            <label for="id_cliente">CPF Cliente: *</label>
                            <input type="text" class="form-control auto" id="id_cliente" name="cpf_cliente">
                        </div>
                        <!--div class="form-group">
                            <label for="valor">Valor: </label>
                            <input type="number" class="form-control" id="valor" name="valor">
                        </div-->
                        <div class="div_btns">
                            <button class="btn btn-success">Cadastrar</button>
                            <button class="btn btn-primary">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
        escreve_rodape();
    ?>
    <script src="../../../lib/js/jquery-ui.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $(document).ready(function() {
            $(".auto").autocomplete({
                source: "search.php",
                minLength: 3
            });         
        });
    </script>
</body>
</html>