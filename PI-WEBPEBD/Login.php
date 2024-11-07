<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect-IF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="Login">
    <?php
        include "function.php";
    ?>
    <!--- Logo --->
    <div class="logo-container">
        <img src="LOGO CONNECT IF.png" alt="Logo Connect" class="logo">
    </div>
    <!--- Login --->
    <div class="content-Login">
        <div class="content">
            <form action="">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" placeholder="Digite sua matrícula">

                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Digite sua senha">

                <button type="submit" class="btn-3" >Acessar</button>
                <button type="button" class="btn-3" onclick="window.location.href='Cadastro.php'" name="BT1">Cadastro</button>
            </form>
        </div>
    </div>
</body>

</html>