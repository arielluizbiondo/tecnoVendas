<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Tecno Vendas</title>
</head>
<body class="bg-secondary-subtle">
        <form action="">
            <div class="card w-75 m-auto mt-2 mb-4">
                <img src="../img/2.png" alt="" class="card-img-top m-auto mb-4" style="width: 10%;">
                <div class="card-body ">
                    <div class="row mb-4">
                        <div class="col-md-10">
                            <label for="">Produto</label>
                            <input type="number" class="form-control" name="cpProduto">
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-success mt-4 w-100" value="Buscar">
                        </div>
                    </div>
                    <table class="table table-bordered mt-03">
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
                            <tr>
                                <td>03</td>
                                <td>Placa mãe do Asus</td>
                                <td>ASUS</td>
                                <td>587.99</td>
                                <td>10</td>
                                <td><a href="#">selecionar</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <p class="fs-2 text-end mb-4">Total: R$ 0.00</p>
                        </div>
                        <div class="col-8">
                            <a href="index.php">Voltar</a>
                        </div>
                        <div class="col-4">
                            <label name="cpVendedor">Vendedor: XXXXXXXXX</label>
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