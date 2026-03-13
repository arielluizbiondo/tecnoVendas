<?php 
    //funcao conexao com banco de dados 22062006sql.
    function conecta(){
        $pdo = new PDO('mysql:dbname=tecnovendas','root','');
        //xamp - não usa senha
        //se não usa xamp - senha 'root'
        $pdo ->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //Ativar no PDO o modo de tratar erros ao conectar no banco
        return $pdo;
    }//conecta

    function cadastrar_usuario($nome,$tipo,$login,$senha){
        $pdo = conecta();
        $query = $pdo->prepare('INSERT INTO usuario(nomeus,tipo,login,senha) 
        VALUES (:a,:b,:c,:d)');
        //no PHP verifica se a sintaxe do SQL está correta
        $query->bindvalue(':a',$nome);
        $query->bindvalue(':b',$tipo);
        $query->bindvalue(':c',$login);
        $query->bindvalue(':d',$senha);
        //faz a correspodencia entre o elemento da query :a com parametro da funcao
        $query->execute();
        //executa a query sql no php
        return 'Cadastrado com sucesso!';
    }//cadastrar_usuario

    function logar($login, $senha){
        $pdo = conecta();
        $query = $pdo->prepare("SELECT * FROM usuario WHERE login = :x and senha = :y;");
        $query->bindValue(":x", $login);
        $query->bindValue(":y", $senha);
        $query->execute();
        $tipoUsuario = $query->fetch(PDO::FETCH_ASSOC);

        if($query->rowCount()<=0)
        {
            return "Falha ao logar! Verifique o campo.";
        }
        else
        {
            session_start();
            $_SESSION['idus'] = $tipoUsuario['idus'];

            if ($tipoUsuario['tipo'] == 'administrador') {
                header('Location: CadastroProdutos.php');
                exit();
            }
            else
            {
                header('Location:main.php');
                return $tipoUsuario['idus'];
            }
        }
    }

    function cadastrarProdutos($cpNomePro, $cpFab, $cpPreco, $cpEstoq)
    {
        $pdo = conecta();
        $query = $pdo->prepare("INSERT INTO produto(nomepro, fab, preco, estoque) values(:a, :b, :c, :d);");
        $query->bindValue(":a", $cpNomePro);
        $query->bindValue(":b", $cpFab);
        $query->bindValue(":c", $cpPreco);
        $query->bindValue(":d", $cpEstoq);
        $query->execute();
        header('Location:CadastroProdutos.php');
        return 'Produto cadastrado com sucesso!';
    }
    function selecionadoProdutos()
    {
        $pdo = conecta();
        $query = $pdo->prepare("SELECT * FROM produto;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function selecionadoProdutosEstoque()
    {
        $pdo = conecta();
        $query = $pdo->prepare("SELECT * FROM contadorestoque;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    

    function cadastrarVendaCliente($nomecli, $cpfcli)
    {
        $pdo = conecta();
        $query = $pdo->prepare('INSERT INTO venda(idus,nomecli,cpfcli) VALUES (1,:a,:b)');
        $query->bindValue(':a',$nomecli);
        $query->bindValue(':b',$cpfcli);
        $query->execute();
        return 'Cadastrado com sucesso!';
    }

    function updateProduto($estoque, $idproduto) 
    {
        $pdo = conecta();
        $query = $pdo->prepare('UPDATE contadorEstoque SET estoque = :x WHERE idproduto = :y');
        $query->bindValue(':x', $estoque);
        $query->bindValue(':y', $idproduto);
        $query->execute();
    }

    function subtrai()
    {
        $pdo = conecta();
        $query = $pdo->prepare('SELECT idproduto, nomepro, fab, preco, (estoque - estoqueNovo) as estoque FROM produto;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function valorTotal()
    {
        $pdo = conecta();
        $query = $pdo->prepare('SELECT SUM(preco * (estoque - estoqueNovo)) AS total FROM produto');
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
    
        return $resultado['total'];
    }

    function pegaID()
    {
        $pdo = conecta();
        $query = $pdo->prepare('SELECT max(idvenda) from venda');
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    function selecionaCliente($id)
    {
        $pdo = conecta();
        $query = $pdo->prepare("SELECT * FROM venda WHERE idvenda = :a");
        $query->bindValue(':a', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    function selecionaUsuario($id)
    {
        $pdo = conecta();
        $query = $pdo->prepare("SELECT * FROM usuario WHERE idus = :a");
        $query->bindValue(':a', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function pesquisaProdutos($nomeProduto) 
    {
        $pdo = conecta();
        $query = $pdo->prepare('SELECT * FROM produto WHERE nomepro LIKE :a');
        $query->bindValue(':a', "%$nomeProduto%");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>