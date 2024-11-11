<?php
session_start();
include "Banco.php"; // Inclui o arquivo de conexão

// Verifica se o botão com o nome "BT1" foi pressionado
if (isset($_POST['BT1'])) {
    $matricula = strval($_POST['matricula']); // Converte a entrada de 'matricula' para uma string
    $senha = strval($_POST['senha']); // Converte a entrada de 'senha' para uma string


    // Prepara a consulta SQL para buscar o usuário com a matrícula informada
    $consulta = "SELECT * FROM `usuario` WHERE `matricula` = '$matricula'";

    // Executa a consulta ao banco de dados e verifica se houve erro
    $resultado = $banco->query($consulta);

    if ($resultado === false) {
        // Armazena a mensagem de erro no caso de falha na consulta e redireciona para a página de login
        $_SESSION['login_erro'] = "Erro ao consultar o banco de dados: " . $banco->error;
        header("Location: Login.php");
        exit;
    }

    // Verifica se foi encontrado um usuário com a matrícula informada
    if ($resultado->num_rows === 1) {
        // Obtém os dados do usuário encontrado
        $usuario = $resultado->fetch_assoc();
        $senhaHash = $usuario['senha'];

        // Compara a senha informada com a senha armazenada no banco de dados
        if (password_verify($senha, $senhaHash)) {
            // Se a senha estiver correta, inicia uma sessão para o usuário e redireciona para a área restrita
            $_SESSION['user'] = $usuario['matricula'];
            header("Location: Usuario.php");
            exit;
        } else {
            // Se a senha estiver incorreta, armazena uma mensagem de erro na sessão e redireciona para a página de login
            $_SESSION['login_erro'] = "Falha ao logar! A senha está incorreta.";
            header("Location: Login.php");
            exit;
        }
    } else {
        // Se não foi encontrado nenhum usuário com a matrícula informada
        $_SESSION['login_erro'] = "Falha ao logar! Matrícula ou senha incorretos.";
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
        <?php
            if (isset($_SESSION['login_erro'])) {
                echo "<p style='color: red; font-weight: bold; text-align: top;'>" . $_SESSION['login_erro'] . "</p>";
                unset($_SESSION['login_erro']);
            }
        ?>
        <div class="content">
            <form action="Login.php" method="POST">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" placeholder="Digite sua matrícula" name="matricula" pattern="[0-9]{12}" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Digite sua senha" name="senha" required>

                <input type="submit" value="Acessar" class="btn-3" name="BT1">
                <button type="button" class="btn-3" onclick="window.location.href='Cadastro.php'">Cadastro</button>
            </form>
        </div>
    </div>
</body>

</html>