<?php
    include '../menu.php';
    
    $id = $_REQUEST['id'];
    
    $icons = array('../../../img/menu_icon/icon-client-20.png', '../../../img/menu_icon/icon-rent-20.png', '../../../img/menu_icon/icon-home-20.png', '../../../img/menu_icon/icon-user-20.png', '../../../img/menu_icon/icon-exit-20.png');
    #$icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');
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
    <link href="../../../lib/css/style_informacoes.css" rel="stylesheet">
</head>

<body>
    <?php
        include('../../../Control/Imovel_Control.php');
        $obj_imovel = new Imovel_Control();
        $dados = $obj_imovel->verDados();
        foreach ($dados as $d) {
            $endereco = $d['endereco'];
            $numero = $d['numero'];
            $bairro = $d['bairro'];
            $cep = $d['cep'];
            $complemento = $d['complemento'];
            $valor = $d['valor_imovel'];
            $status = $d['status'];
            if($status == '0'){
                $status = 'Desocupado';
            }else{
                $status = 'Ocupado'; 
            }
            $img = $d['img_imovel'];
        }
    ?>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp", $icons, "../home_vendedor.php", "../clientes/clientes.php", "../aluguel/aluguel.php", "imoveis.php", "../usuario/usuario.php", "../../../Control/Vendedor_Control.php?acao=logout");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Imóveis", "imoveis.php", "Cadastrar", "cadastra_imovel.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="informacao_imovel" class="info_imovel">
                    <h2 style="text-align: center;">Informação Imóvel</h2>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../../../img/imoveis/15755679025de9421ebfeff.jpeg" alt="First slide" style="height: 600px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../../img/imoveis/15755732745de9571a01189.jpeg" alt="Second slide" style="height: 600px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../../img/imoveis/15755679315de9423b2cd30.jpeg" alt="Third slide" style="height: 600px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <dl id="lista_informacoes">
                        <div>
                            <dt>Id: </dt>
                            <dd><?php echo$id; ?></dd>
                        </div>
                        <div>
                            <dt>Endereço: </dt>
                            <dd><?php echo$endereco; ?></dd>
                        </div>
                        <div>
                            <dt>Número: </dt>
                            <dd><?php echo$numero; ?></dd>
                        </div>
                        <div>
                            <dt>Bairro: </dt>
                            <dd><?php echo$bairro; ?></dd>
                        </div>
                        <div>
                            <dt>Cep: </dt>
                            <dd><?php echo$cep; ?></dd>
                        </div>
                        <div>
                            <dt>Complemento: </dt>
                            <dd><?php echo$complemento; ?></dd>
                        </div>
                        <div>
                            <dt>Valor: </dt>
                            <dd><?php echo$valor; ?></dd>
                        </div>
                        <div>
                            <dt>Status: </dt>
                            <dd class="<?php echo$status; ?>"><?php echo$status; ?></dd>
                        </div>
                    </dl>
                    <div class="div_btn">
                        <button class="btn btn-info btn-editar">Editar</button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </div>
                <div id="edita_imovel" class="info_imovel">
                    <table class='table table-bordered table-hover'>
                        <tr>
                            <td style="border-right: none;">
                                <h3>Editar Imóvel</h3>
                            </td>
                            <td class="d-flex justify-content-end" style="border: none;">
                                <button class="btn btn_close_edit">
                                    <img src="../../../img/icon-fechar.png" style="width: 25px; height: 25px;">
                                </button>        
                            </td>
                        </tr>

                        <form action="gerencia_imovel.php?acao=editar" method="POST" enctype="multipart/form-data">
                            <tr>
                                <input type="hidden" id="img_perfil_atual" name="img_perfil">
                                <input type="hidden" id="cliente_id" name="cliente_id">
                                <input type='hidden' name="campo_senha" id="campo_senha">
                                <td colspan="2">
                                    <label for="endereco" class='col-sm-3'>Endereço: *</label>
                                    <input type="text" name="campo_endereco" id="endereco" class="validate  col-sm-9" value="<?php echo$endereco; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="numero" class='col-sm-3'>Número: *</label>
                                    <input type="number" name="campo_numero" id="numero" class="validate col-sm-9" value="<?php echo$numero; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="bairro" class='col-sm-3' >Bairro: *</label>
                                    <input type="text" name="campo_bairro" id="bairro" class="validate  col-sm-9 " value="<?php echo$bairro; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="cep" class='col-sm-3'>CEP: *</label>
                                    <input type="text" name="campo_cep" id="cep" class="validate  col-sm-9" value="<?php echo$cep; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="complemento" class='col-sm-3'>Complemento: *</label>
                                    <input type="text" name="campo_complemento" id="validate" class="validate col-sm-9" value="<?php echo$complemento; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="valor" class='col-sm-3'>Valor: *</label>
                                    <input type="number" name="campo_valor" id="valor" class="validate  col-sm-9" value="<?php echo$valor; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="status" class='col-sm-3'>Status</label>
                                    <input type="text" id="desabled" class="validate  col-sm-9 <?php echo$status; ?>" value="<?php echo$status; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="img" class='col-sm-3'>Imagem: </label>
                                    <input type="file" name="arquivo" id="img" class="validate col-sm-9">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-success">Editar</button>
                                    <button class="btn btn-info">Limpar</button>
                                    <button class="btn btn-primary">Cancelar</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php 
        escreve_rodape();
    ?>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script src="../../../lib/js/informacoes.js"></script>
</body>

</html>