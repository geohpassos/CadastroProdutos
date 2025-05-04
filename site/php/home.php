<?php
session_start(); // Inicia a sessão

if (isset($_SESSION['usuario'])) {
    echo "Bem-vindo, " . $_SESSION['usuario'] . "!";
} else {
    echo "Usuário não autenticado.";
}
?>

<html>         
            
    <head>
        <meta charset="UTF-8" />
        <title>Tela da HOME</title>
        <link rel="stylesheet" href="../css/home.css">
    </head>

    <body class="corpo">    
        <div class="menu">
            <ul id="menu-horizontal">
                <li><a href="./home.php"> INICIO </a></li>
                <li><a href="./cadastrar-produto.php"> CADASTRAR PRODUTO </a></li>
            </ul>
        </div>
            <h1>Olá, seja bem vindo!</h1>
            <h2>Página inicial do nosso site.</h2>

    </body>

</html>