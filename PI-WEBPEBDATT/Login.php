<?php
include "function.php";

// Verifica se o botão com o nome "BT1" foi pressionado
if (isset($BT1)) {
    // Escapa caracteres especiais da matrícula para evitar injeções SQL.
    $matricula = $banco->real_escape_string($matricula);

    // Prepara a consulta SQL para buscar o usuário com a matrícula informada.
    $consulta = "SELECT * FROM usuario WHERE matricula = '$matricula'";
    // Executa a consulta ao banco de dados utilizando a função "banco" definida em "function.php".
    $resultado = banco("localhost", "root", NULL, "pinovo", $consulta);

    // Verifica se foi encontrado um usuário com a matrícula informada.
    if ($resultado->num_rows == 1) {
        // Obtém os dados do usuário encontrado.
        $nome = $resultado->fetch_assoc();
        $senhaHash = $nome['senha'];

        // Compara a senha informada com a senha armazenada no banco de dados.
        if (password_verify($senha, $senhaHash)) {
            // Se a senha estiver correta, inicia uma sessão para o usuário e redireciona para a área restrita.
            $_SESSION['matricula'] = $nome['matricula'];
            $_SESSION['nome'] = $nome['nome'];
            header("Location: Usuario.html");
            exit;
        } else {
            // Se a senha estiver incorreta, armazena uma mensagem de erro na sessão e redireciona para a página de login.
            $_SESSION['login_erro'] = "Falha ao logar! Matrícula ou senha incorretos";
            header("Location: Login.php");
            exit;
        }
    } else {
        // Se não foi encontrado nenhum usuário com a matrícula informada, armazena uma mensagem de erro na sessão e redireciona para a página de login.
        $_SESSION['login_erro'] = "Falha ao logar! Matrícula ou senha incorretos";
        header("Location: Login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect-IF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="Login">
    <!--- Logo --->
    <div class="logo-container">
        <img src="LOGO CONNECT IF.png" alt="Logo Connect" class="logo">
    </div>
    <!--- Login --->
    <div class="content-Login">
        <div class="content">
            <form action="Login.php" method="POST">
                <?php
                    session_start();
                    if (isset($_SESSION['login_erro'])) {
                        print_r($_SESSION['login_erro']);
                        unset($_SESSION['login_erro']);
                    }
                ?>
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" placeholder="Digite sua matrícula" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Digite sua senha" required>

                <input type="submit" value="Acessar" class="btn-3" name="BT1">
                <button type="button" class="btn-3" onclick="window.location.href='Cadastro.php'" name="BT1">Cadastro</button>
            </form>
        </div>
    </div>
</body>

</html>