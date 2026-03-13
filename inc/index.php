<?php
    session_start();
    include 'funcoes.php';

    if (!empty($_POST)){
        $login = $_POST['cpLogin'];
        $senha = $_POST['cpSenha'];
        $logar = logar($login, $senha);
        $selecionaUsuario = selecionaUsuario($logar);
        echo '<div class="alert alert-danger" role="alert">';
            echo 'Senha e/ou cadastro errados';
        echo '</div>';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tecno Vendas</title>
</head>
<body class="bg-success-subtle">
    <form action="" method="post">
        <div class="card w-25 m-auto mt-5">
            <img src="../img/logos/2.png" class="card-img-top w-50 m-auto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Login</label>
                            <input name="cpLogin" type="text" class="form-control" id="floatingInput" placeholder="Login">
                            <label for="" class="form-label">Senha</label>
                            <input name="cpSenha" type="password" class="form-control" id="floatingInput" placeholder="Senha">
                            <br>
                            <input type="submit" name="" id=""  value="ENTRAR" class="btn btn-success w-100">
                        </div>
                        <div class="col-6 mt-3">
                            <a href="newUser.php">Sou novo aqui</a>
                        </div>
                        <div class="col-6 mt-3 text-end">
                            <a href="#">Esqueci a senha</a>
                        </div>
                    </div>
                </div>
        </div>
        <footer class="text-white bg-dark w-100 text-center" style="position: fixed; bottom: 0; left: 0;">
            Tecno vendas 2024 - Mantido e Desenvolvido por Ariel Biondo (a.biondo@estudante.ifmt.edu.br)
        </footer>
    </form>
</body>
</html>