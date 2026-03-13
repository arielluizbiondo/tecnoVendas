<?php
    include 'funcoes.php';
    if (!empty($_GET)){
        $nome = $_GET['cpNome'];
        $tipo = $_GET['cpTipo'];
        $login = $_GET['cpLogin'];
        $senha = $_GET['cpSenha'];
        $msg = cadastrar_usuario($nome,$tipo,$login,$senha);
        echo '<div class="alert alert-success" role="alert">';
            echo $msg;
        echo '</div>';
    }//if_GET
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Novo usuario</title>
</head>
<body class="bg-success-subtle">
    
    <form action="">
        <div class="card w-75 m-auto mt-4">
            <hr color="green" width="500px"  class="m-auto mt-3">
            <img src="../img/logos/2.png" class="card-img-top m-auto" style="width: 15%;">
            <hr color="green" width="500px" class="m-auto">
            <div class="row p-5">
                <div class="col-3">
                    <label for="">Nome:</label>
                    <input name="cpNome" type="text" class="form-control">
                </div>
                <div class="col-3">
                    <label for="">Tipo</label>
                    <select name="cpTipo" required class="form-select " id="">
                        <option selected disabled>Escolha o tipo de usúario</option>
                        <option value="vendedor">Vendedor</option>
                        <option value="administrador">Administrador</option>
                        <option value="estagiario">Estagiário</option>
                    </select>
                </div>
                <div class="col-2">
                    <label>Login</label>
                    <input type="text" class="form-control" name="cpLogin">
                </div>
                <div class="col-2">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="cpSenha">
                </div>
                <div class="col-2 mt-4">
                    <input type="submit" value="CADASTRAR" class="btn btn-success">
                </div>
                <div class="col-12">
                    <a href="index.php" class="mt-5">Voltar</a>
                </div>
            </div>
        </div>
    </form>
        
    <footer class="text-white bg-dark w-100 text-center" style="position: fixed; bottom: 0; left: 0;">
        Tecno vendas 2024 - Mantido e Desenvolvido por Ariel Biondo (a.biondo@estudante.ifmt.edu.br)
    </footer>
</body>
</html>