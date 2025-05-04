<html>               
    <head>
        <meta charset="UTF-8" />
        <title>Tela de cadastro produto</title>
        <link rel="stylesheet" type="text/css" href="../css/cadastroProduto.css">
    </head>
    <body class="corpo">
        <div class="container">
            <div class="formulario">
                <form id="form-cadastropd" action="../php/cadastrar-produto.php" method="POST">
                    <h3>Cadastro de Produto</h3>
                    <input type="text" name="nome" placeholder="Nome do Produto" required minlength="3" maxlength="80">

                    <input type="text" name="marca" placeholder="Marca" required minlength="3" maxlength="80">

                    <input type="text" name="preco" placeholder="Preço" required minlength="3" maxlength="80">

                    <input type="text" name="descricao" placeholder="Descrição" required minlength="3" maxlength="300">

                    <input type="submit" value="CONFIRMAR">
                </form>
            </div>
        </div>
    </body>
</html>
<?php 

include("conexao.php");

$nomeProduto = $_POST['nome'] ?? null;
$marca = $_POST['marca'] ?? null;
$preco = $_POST['preco'] ?? null;
$descricao = $_POST['descricao'] ?? null;

if (!$nomeProduto || !$marca || !$preco || !$descricao) {
    
    echo "Preencha todos os campos.";
    exit;
}

try {

    $varVerifica = $pdo->prepare("SELECT COUNT(*) FROM produto WHERE nome = :nome"); //
    $varVerifica->bindParam(':nome', $nomeProduto);
    $varVerifica->execute();

    if ($varVerifica->fetchColumn() > 0) {
        echo " Produto já Cadastrado ";
        exit;
    }

    $pdo->beginTransaction();

    $varProduto = $pdo->prepare("INSERT INTO produto (nome, marca, preco, descricao) VALUES (:nome, :marca, :preco, :descricao)");
    $varProduto->bindParam(':nome', $nomeProduto);
    $varProduto->bindParam(':marca', $marca);
    $varProduto->bindParam(':preco', $preco);
    $varProduto->bindParam(':descricao', $descricao);
    $varProduto->execute();
    $pdo->commit();

    echo "Cadastro do produto realizado com sucesso!";

    //caso o cadastro de erro, irá entrar no catch e exibir o erro.
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Erro ao cadastrar: " . $e->getMessage();
}

?>
