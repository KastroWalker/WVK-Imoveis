<?php 
    include '../menu.php';
    session_start();
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

    <title>Clientes - WVK Imóveis</title>

    <link href="../../../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
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
                    menu("Clientes" ,"clientes.php", "Cadastrar" , "cadastra_cliente.php");
                ?>
            </header>
            <div class="container-fluid">
                <div id="div_cadastro_clientes">
                    <h2 style="text-align: center;">Cadastro Clientes</h2>
                    <?php 
                        if(isset($_SESSION['cliente_cadastrado'])){
                            echo "
                                <div class='alert alert-success text-center'>
                                    Cliente Cadastrado com Sucesso!<br/>
                                    Clique <a href='clientes.php'><strong>aqui</strong></a> para ver os Cliente!
                                </div>
                            ";
                        }
                        unset($_SESSION['cliente_cadastrado']);
                        if(isset($_SESSION['cliente_nao_cadastrado'])){
                            echo "
                                <div class='alert alert-danger text-center'>
                                    Erro ao cadastrar o Cliente!
                                </div>
                            ";
                        }
                        unset($_SESSION['cliente_nao_cadastrado']);
                    ?>
                    <form method="POST" action="gerencia_cliente.php?acao=cadastrar" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nome">Nome: *</label>
                            <input type="text" name="campo_nome" id="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="contato">Contato: *</label>
                            <input type="text" name="campo_contato" id="contato" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF: *</label>
                            <input type="text" name="campo_cpf" id="cpf" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail: *</label>
                            <input type="email" name="campo_email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="user">Usuário: </label>
                            <input type="text" name="campo_usuario" id="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha: </label>
                            <input type="password" name="campo_senha" id="senha" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="img">Foto Perfil: </label>
                            <input type="file" name="arquivo" id="img" class="form-control">
                        </div>
                        <div class="div_btns">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                        </div>
                    </form>
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
</body>
</html>