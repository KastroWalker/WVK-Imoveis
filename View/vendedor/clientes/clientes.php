<?php
    include '../menu.php';
    include '../../../Control/Cliente_Control.php';
    #$icons = array('../../../img/menu_icon/icon-client.png', '../../../img/menu_icon/icon-rent.png', '../../../img/menu_icon/icon-home.png', '../../../img/menu_icon/icon-user-male.png', '../../../img/menu_icon/icon-exit.png');

    $icons = array('../../../img/menu_icon/icon-client-20.png', '../../../img/menu_icon/icon-rent-20.png', '../../../img/menu_icon/icon-home-20.png', '../../../img/menu_icon/icon-user-20.png', '../../../img/menu_icon/icon-exit-20.png');

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

    <link rel="icon" href="../../../img/icon.webp" type="image/x-icon" />

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/css/style_cliente.css" rel="stylesheet">
    <link href="../../../lib/css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        slideBar("../../../img/icon.webp", $icons, "../home_vendedor.php", "clientes.php", "../aluguel/aluguel.php", "../imoveis/imoveis.php", "../usuario/usuario.php", "../../../Control/Vendedor_Control.php?acao=logout");
        ?>
        <div id="page-content-wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Menu</button>
                </nav>
                <?php
                menu("Clientes", "clientes.php", "Cadastrar", "cadastra_cliente.php");
                ?>
            </header>
            <!-- Modal Delete -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apagar Cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="gerencia_cliente.php?acao=deletar" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" id="delete_id">
                                <input type="hidden" name="img_perfil" id="img_perfil">
                                <h4> Você tem certeza que deseja apagar esse Cliente? </h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Não </button>
                                <button type="submit" name="deletedata" class="btn btn-danger"> Sim, deletar!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div id="div_clientes">
                    <h2 style="text-align: center;">Clientes</h2>
                    <?php 
                        if(isset($_SESSION['cliente_excluido'])){
                            echo "
                                <div class='alert alert-success text-center'>
                                    Cliente Excluido com Sucesso!<br/>
                                </div>
                            ";
                        }
                        unset($_SESSION['cliente_excluido']);
                        if(isset($_SESSION['cliente_nao_excluido'])){
                            echo "
                                <div class='alert alert-danger text-center'>
                                    Erro ao excluir o Cliente!
                                </div>
                            ";
                        }
                        unset($_SESSION['cliente_nao_excluido']);
                        if(isset($_SESSION['cliente_editado'])){
                            echo "
                                <div class='alert alert-success text-center'>
                                    Cliente Editado com Sucesso!<br/>
                                </div>
                            ";
                        }
                        unset($_SESSION['cliente_editado']);
                        if(isset($_SESSION['cliente_nao_editado'])){
                            echo "
                                <div class='alert alert-danger text-center'>
                                    Erro ao editar o Cliente!
                                </div>
                            ";
                        }
                        unset($_SESSION['cliente_nao_editado']);
                    ?>
                    <table class="table table-hover">
                        <tr>
                            <th>Indice</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th colspan="2">Ações</th>
                        </tr>
                        <?php
                        $x = 1;
                        foreach ($dados as $d) {
                            echo "<tr>";
                            echo "<td>".$x."</td>";
                            echo "<td><a href='#info_cliente' class='cliente'>".$d['nome']."</a></td>";
                            echo "<td>".$d['cpf']."</td>";
                            echo "<td style='display: none;'>".$d['cliente_id']."</td>";
                            echo "<td style='display: none;'>".$d['contato']."</td>";
                            echo "<td style='display: none;'>".$d['email']."</td>";
                            echo "<td style='display: none;'>".$d['user']."</td>";
                            echo "<td style='display: none;'>".$d['senha']."</td>";
                            echo "<td style='display: none;'>".$d['img_perfil']."</td>";
                            echo "<td><button class='btn btn-info btn-edit'><img src='../../../img/icon_crud/icon-edit.png'></img></button></td>";
                            echo "<td><button class='btn btn-danger btn-delete'><img src='../../../img/icon_crud/icon-delete.png'></img></button></td>";
                            echo "</tr>";
                            $x++;
                        }
                        ?>
                    </table>
                    <div id="info_cliente" class="info_cliente">
                        <table class='table table-bordered table-hover'>
                            <tr>
                                <td style="border-right: none;">
                                    <h3 >Infomações Cliente</h3>
                                </td>
                                <td class="d-flex justify-content-end" style="border: none;">
                                    <button class="btn btn_close">
                                        <img src="../../../img/icon-fechar.png" style="width: 25px; height: 25px;">
                                    </button>        
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <img src="" alt="perfil_cliente" id="perfil_cliente" style="width: 100px; width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <dt class='col-sm-3'>Nome: </dt>
                                    <dd class='col-sm-9' id="nome_cliente"></dd>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <dt class='col-sm-3'>Contato: </dt>
                                    <dd class='col-sm-9' id="contato_cliente"></dd>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <dt class='col-sm-3'>Cpf: </dt>
                                    <dd class='col-sm-9' id="cpf_cliente"></dd>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <dt class='col-sm-3'>Email: </dt>
                                    <dd class='col-sm-9' id="email_cliente"></dd>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <dt class='col-sm-3'>Usuário: </dt>
                                    <dd class='col-sm-9' id="user_cliente"></dd>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <dt class='col-sm-3'>Senha </dt>
                                    <dd class='col-sm-9' id="senha_cliente"></dd>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <!-- Div de Edit -->
                    <div id="info_cliente" class="edit_cliente">
                        <table class='table table-bordered table-hover'>
                            <tr>
                                <td style="border-right: none;">
                                    <h3>Edita Cliente</h3>
                                </td>
                                <td class="d-flex justify-content-end" style="border: none;">
                                    <button class="btn btn_close_edit">
                                        <img src="../../../img/icon-fechar.png" style="width: 25px; height: 25px;">
                                    </button>        
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <img src="" alt="perfil_cliente" id="img_perfil_cliente" style="width: 100px; width: 100px;">
                                </td>
                            </tr>
                            <form action="gerencia_cliente.php?acao=editar" method="POST" enctype="multipart/form-data">
                                <tr>
                                    <input type="hidden" id="img_perfil_atual" name="img_perfil">
                                    <input type="hidden" id="cliente_id" name="cliente_id">
                                    <input type='hidden' name="campo_senha" id="campo_senha">
                                    <td colspan="2">
                                        <label class='col-sm-3'>Nome: </label>
                                        <input class='col-sm-9 validate' type='text' name="campo_nome" id="campo_nome">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class='col-sm-3'>Contato: </label>
                                        <input class='col-sm-9 validate' type='text' name="campo_contato" id="campo_contato">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class='col-sm-3'>Cpf: </label>
                                        <input class='col-sm-9 validate' type='text' name="campo_cpf" id="campo_cpf">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class='col-sm-3'>Email: </label>
                                        <input class='col-sm-9 validate' type='email' name="campo_email" id="campo_email">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class='col-sm-3'>Usuário: </label>
                                        <input class='col-sm-9 validate' type='text' name="campo_usuario" id="campo_user">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class='col-sm-3'>Foto Perfil </label>
                                        <input class='col-sm-9 validate' type='file' name="arquivo">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-success">Editar</button>
                                        <button type="reset" class="btn btn-primary">Limpar</button>
                                        <button type="button" class="btn btn-danger">Cancelar</button>
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
    <script src="../../../lib/js/clientes.js"></script>
</body>

</html>