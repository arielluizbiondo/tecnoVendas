<?php
    include 'funcoes.php';
    session_start();
    
    $resultado = [];
    
    if (isset($_GET['cpProduto']))
    {
        $nomeProduto = $_GET['cpProduto'];
        $resultado = pesquisaProdutos($nomeProduto);
    }

    if (!isset($_SESSION['carrinho'])) 
    {
        $_SESSION['carrinho'] = [];
    }

    $itens = selecionadoProdutosEstoque();

    if (isset($_GET['adicionar'])) 
    {
        $idProduto = (int)$_GET['adicionar'];

        foreach ($itens as $produto) 
        {
            if ($produto['idproduto'] == $idProduto) 
            {
                if (isset($_SESSION['carrinho'][$idProduto])) 
                {
                    $_SESSION['carrinho'][$idProduto]['estoque']--;
                } 
                else 
                {
                    $_SESSION['carrinho'][$idProduto] = [
                        'idproduto' => $produto['idproduto'],
                        'nome'      => $produto['nomepro'],
                        'fabricante'=> $produto['fab'],
                        'preço'     => $produto['preco'],
                        'estoque'   => $produto['estoque'] - 1,
                    ];
                }
                updateProduto($_SESSION['carrinho'][$idProduto]['estoque'], $idProduto);
                echo '<script>alert("Adicionado ao carrinho e estoque atualizado")</script>';
                break;
            }
        }
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
    <form action="" method="get">
        <div class="card w-75 m-auto mt-5" style="background-color: white;">
            <img src="../img/logos/2.png" class="card-img-top m-auto" style="width: 10%;">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <label>Produto</label>
                        <input class="form-control" placeholder="Ex: Mouse Ariel Biondo" type="text" name="cpProduto">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success mt-4 w-100" value="Buscar">
                    </div>
                    <table class="table mt-3 table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Fabricante</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (empty($resultado)) 
                                {
                                    foreach ($itens as $produto) 
                                    {
                                        echo '<tr>';
                                        echo '<td>' . $produto['idproduto'] . '</td>';
                                        echo '<td>' . $produto['nomepro'] . '</td>';
                                        echo '<td>' . $produto['fab']  . '</td>';
                                        echo '<td> R$ ' .$produto['preco'] . '</td>';
                                        echo '<td>' . $produto['estoque'] . '</td>';
                                        echo '<td><a href="?adicionar=' . $produto['idproduto'] . '">Selecionar</a></td>';
                                        echo '</tr>';
                                    }
                                }
                                else{
                                    foreach ($resultado as $produtos) 
                                    {
                                        echo '<tr>';
                                        echo '<td>' . $produtos['idproduto'] . '</td>';
                                        echo '<td>' . $produtos['nomepro'] . '</td>';
                                        echo '<td>' . $produtos['fab'] . '</td>';
                                        echo '<td> R$ ' . $produtos['preco'] . '</td>';
                                        echo '<td>' . $produtos['estoque'] . '</td>';
                                        echo '<td><a href="?adicionar=' . $produtos['idproduto'] . '">Selecionar</a></td>';
                                        echo '</tr>';
                                    }
                                }
                                
                            ?>
                        </tbody>
                    </table>
                    <div class="col-md-8">
                        <a href="main.php">Sair</a>
                    </div>

                    <div class="col-md-12 text-end mt-3">
                        <label class="fw-bold">Vendedor: Ariel Luiz Biondo</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
