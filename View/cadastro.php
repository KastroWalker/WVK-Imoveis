<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Alugel de Imóveis">
    <meta name="author" content="Victor Castro">

    <title>Login - WVK Imóveis</title>

    <link href="../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/css/style_login.css" rel="stylesheet">   
</head>
<body>
    <header>
       <h1 style="text-align: center;">WVK Imóveis</h1> 
       <hr>
    </header>
    <main>
        <div class="container">
            <h2>Cadastro</h2>
            <div id="div_cadastro">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome: *</label>
                        <input type="text" id="nome" name="campo_nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contato">Contato: *</label>
                        <input type="text" id="contato" name="campo_contato" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF: *</label>
                        <input type="text" id="cpf" name="campo_cpf" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail: *</label>
                        <input type="text" id="email" name="campo_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user">Usuário: *</label>
                        <input type="text" id="user" name="campo_user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha: *</label>
                        <input type="text" id="senha" name="campo_senha" class="form-control">
                    </div>
                    <div id="div_btns">
                        <button class="btn btn-success">Cadastrar</button>
                        <button class="btn btn-info">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer style="text-align: center;">
        <hr>
        <script src="../lib/js/jquery.js"></script>
        <script src="../lib/js/bootstrap/bootstrap.min.js"></script>
        <h2>Direitos</h2>
        <p>2019 &copy; Copyright - Todos os direitos reservados | Tico && Teco.</p>
    </footer>
</body>
</html>