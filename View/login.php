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
            <h2>Login</h2>
            <div id="div_login">
                <form action="../Control/login.php" method="POST">
                    <div class="form-group">
                        <label for="usuario">Usuário: </label>
                        <input type="text" class="form-control" id="usuario" name="campo_ususario" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha: </label>
                        <input type="pass" class="form-control" id="senha" name="campo_senha" required>
                    </div>
                    <div id="div_btns">
                        <button class="btn btn-success">Entrar</button>
                        <button class="btn btn-info">Limpar</button>
                    </div>
                    <p id="p_cadastro">Ainda não tem conta? <a href="cadastro.php">Cadastrar-se</a></p>
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