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

        if (isset($BT1)) {

            $matricula = strval($matricula);
            $senha = strval($senha);
        
            if (strlen($matricula) == 0) {
                $_SESSION['login_erro'] = "Preencha sua matrícula";
                header("Location: Login.php");
                exit;
            } elseif (strlen($senha) == 0) {
                $_SESSION['login_erro'] = "Preencha sua senha";
                header("Location: Login.php");
                exit;
            } else {
                $matricula = $mysqli->real_escape_string($matricula);

                $consulta = "SELECT * FROM usuario WHERE matricula = '$matricula'";
                $resultado = banco("localhost", "root", NULL, "pinovo", $consulta);

                if ($resultado->num_rows == 1) {
                    $nome = $resultado->fetch_assoc();
                    $senhaHashh = $nome['senha'];
        
                    if (password_verify($senha, $senhaHashh)) {
                        $_SESSION['matricula'] = $nome['matricula'];
                        $_SESSION['nome'] = $nome['nome'];
                        header("Location: Usuario.html");
                        exit;
                    } else {
                        $_SESSION['login_erro'] = "Falha ao logar! Matrícula ou senha incorretos";
                        header("Location: Login.php");
                        exit;
                    }
                } else {
                    $_SESSION['login_erro'] = "Falha ao logar! Matrícula ou senha incorretos";
                    header("Location: Login.php");
                    exit;
                }
            }
        }
    ?>
    <!--- Logo --->
    <div class="logo-container">
        <img src="LOGO CONNECT IF.png" alt="Logo Connect" class="logo">
    </div>
    <!--- Login --->
    <div class="content-Login">
        <div class="content">
            <form action="Login.php" method="POST">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" placeholder="Digite sua matrícula">

                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Digite sua senha">

                <button type="button" class="btn-3" onclick="window.location.href='Usuario.html';">Acessar</button>
                <button type="button" class="btn-3" onclick="window.location.href='Cadastro.php'" name="BT1">Cadastro</button>
            </form>
        </div>
    </div>
</body>

</html>