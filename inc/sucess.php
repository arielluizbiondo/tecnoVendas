<?php
    include 'funcoes.php';
    session_start();
    
    $idusuario = $_SESSION['idus'];

    $usuario = selecionaUsuario($idusuario);

    $valorTotal = valorTotal();

    $id = pegaID();
    $idVenda = $id['max(idvenda)']; 
    
    $cliente = selecionaCliente($idVenda);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Tecno Vendas</title>
</head>
<body class="bg-success-subtle">
        <form action="">
            <div class="card w-75 m-auto mt-5 mb-4">
                <img src="../img/2.png" alt="" class="card-img-top m-auto mb-4" style="width: 10%;">
                <div class="card-body ">
                    <div class="row mb-4">
                        <div class="col-6">
                            <label for="">Cliente:</label>
                            <label name="cpCliente"><?php echo isset($cliente['nomecli']) ? $cliente['nomecli'] : 'Cliente não cadastrado!'; ?> </label>
                        </div>
                        <div class="col-6">
                            <label for="">CPF: </label>
                            <label name="cpCPF"> <?php echo isset($cliente['cpfcli']) ? $cliente['cpfcli'] : 'Cliente não cadastrado!'; ?></label>
                        </div>
                    </div>
                    <table class="table table-bordered mt-03">
                        <thead>
                            <tr class="table-dark">
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Fabricante</th>
                                <th>Preço</th>
                                <th>QTD</th>
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
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <p class="fs-2 text-end mb-4">Total: R$ <?php echo $valorTotal ?></p>
                        </div>
                        <div class="col-8">
                            <a href="main.php">Voltar</a>
                        </div>
                        <div class="col-4">
                            <label name="cpVendedor">Vendedor: <?php echo $usuario['nomeus']; ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <footer class="text-white bg-dark w-100 text-center" style="position: fixed; bottom: 0; left: 0;">
            Tecno vendas 2024 - Mantido e Desenvolvido por Ariel Biondo (a.biondo@estudante.ifmt.edu.br)
        </footer>
</body>
</html>