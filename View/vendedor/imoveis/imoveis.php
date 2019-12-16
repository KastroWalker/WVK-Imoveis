<?php
    include '../menu.php';
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
    <style>
        .Desocupado{
            color: green;
            font-weight: bold;
        }
        .Ocupado{
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
        include('../../../Control/Imovel_Control.php');
        $obj_imovel = new Imovel_Control();
        $dados = $obj_imovel->verDados();
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
                <!-- Modal Delete -->
                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apagar Imóvel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="gerencia_imovel.php?acao=deletar" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="delete_id" id="delete_id">
                                    <h4> Você tem certeza que deseja apagar esse Imóvel? </h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Não </button>
                                    <button type="submit" name="deletedata" class="btn btn-danger"> Sim, deletar!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="div_aluguel">
                    <h2 style="text-align: center;">Imóveis</h2>
                    <div>
                        <?php
                            $indice = 1;
                            $x = 0;
                            foreach ($dados as $d) {
                                $id = $d['imovel_id'];
                                $img = $d['img_imovel'];
                                $endereco = $d['endereco'];
                                $numero = $d['numero'];
                                $cep = $d['cep'];
                                $status = $d['status'];
                                $obj_imovel->escreve_imovel($img, $endereco, $numero, $cep, $status, $indice, $x, $id);
                                $indice++;
                                $x++;
                            }
                        ?>
                    </div>
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
        $(document).ready(function(){
            $('.btn-alugar').on('click', function(e){
                var id_imovel = e.target.value;
                var pagina = "../aluguel/gera_aluguel.php?id=" + id_imovel;
                window.location.href = pagina;
            });
            $('.btn-informacao').on('click', function(e){
                var id_imovel = e.target.value;
                var pagina = "informacoes.php?id=" + id_imovel;
                window.location.href = pagina;
            });
            $('.btn-delete').on('click', function(e){
                var id_imovel = e.target.value;
                $('#deletemodal').modal('show');
                document.getElementById("delete_id").value = id_imovel;
            });
        });
    </script>
</body>

</html>