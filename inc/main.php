<?php
    include 'funcoes.php';

    session_start();
    $idusuario = $_SESSION['idus'];

    $usuario = selecionaUsuario($idusuario);

    $valorTotal = valorTotal();

    if (!empty($_POST)){
        $cliente = $_POST['cpCliente'];
        $cpf = $_POST['cpCPF'];
        cadastrarVendaCliente($cliente, $cpf);
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
    <form action="" method="POST">
        <div class="card w-75 m-auto mt-5" style="background-color: white;">
            <img src="../img/logos/2.png" class="card-img-top m-auto" style="width: 10%;">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Cliente</label>
                        <input class="form-control" type="text" name="cpCliente">
                    </div>
                    <div class="col-md-4">
                        <label for="">CPF</label>
                        <input type="number" class="form-control" name="cpCPF">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success mt-4 w-100" value="Cadastrar Cliente">
                    </div>
                    <table class="table mt-3 table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Fabricante</th>
                                <th>Preço</th>
                                <th>Qtd</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach(subtrai() as $dados)
                                {
                                    echo '<tr>';
                                    echo '<td>' .$dados['idproduto']. '</td>';
                                    echo '<td>' . $dados['nomepro']. '</td>';
                                    echo '<td>' . $dados['fab']. '</td>';
                                    echo '<td> R$ ' . $dados['preco']. '</td>';
                                    echo '<td>' .$dados['estoque']. '</td>'; 
                                    echo '<td>' . ($dados['preco'] * $dados['estoque']).' </td>';
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="col-md-12 text-end">
                        <label for="" class="fs-5">Total R$ <?php echo $valorTotal ?></label>
                    </div>
                    <div class="col-md-6">
                        <a href="index.php">Sair</a>
                    </div>
                    <div class="col-md-2">
                        <input type="reset" class="btn btn-danger w-100" value="Cancelar">
                    </div>
                    <div class="col-md-2">
                        <a href="adicionar.php" class="btn btn-success w-100">Comprar mais</a>
                    </div>
                    <div class="col-md-2">
                        <a href="sucess.php" class="btn btn-success w-100">Concluir</a>                    
                    </div>
                    <div class="col-md-12 text-end mt-3">
                        <label class="fw-bold">Vendedor: <?php echo $usuario['nomeus']; ?></label> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
