<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect-IF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="Cadastro">
    <!--- PHP --->
    <?php
    session_start();
    extract($_POST);
    include "function.php";

    if (isset($BT1)) {
        if ($senha === $confirmarsenha) {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $incluir = "INSERT INTO `usuario` (`matricula`, `username`, `data_nascimento`, `senha`) 
                        VALUES ('$matricula', '$nome', '$data_nascimento', '$senhaHash')";
            
            $resultado = banco("localhost", "root", NULL, "pinovo", $incluir);

            if ($resultado) {
                header("Location: Login.php");
                exit;
            } else {
                echo "<p>Erro ao cadastrar. Verifique os dados e tente novamente.</p>";
            }
        } else {
            $_SESSION['cadastro_erro'] = "As senhas não coincidem.";
            header("Location: Cadastro.php");
            exit;
        }
    }
    ?>
    <!--- Fim --->
    
    <!--- Logo --->
    <div class="logo-container">
        <img src="LOGO CONNECT IF.png" alt="Logo Connect" class="logo">
    </div>
    <!--- Fim --->
    
    <!--- Cadastro --->
    <div class="quadro-dividido">
        <div class="lado-preto">
            <h2>BEM VINDO DE VOLTA!</h2>
            <p>Estamos felizes em ter você aqui novamente. Vamos continuar aprendendo e crescendo juntos!</p>
            <button class="btn-1" onclick="window.location.href='Login.php'">Login</button>
        </div>
        <div class="lado-branco" id="cadastro">
            <h2>Cadastro Da Conta</h2>
            <?php
            if (isset($_SESSION['cadastro_erro'])) {
                echo "<p style='color: red;'>" . $_SESSION['cadastro_erro'] . "</p>";
                unset($_SESSION['cadastro_erro']);
            }
            ?>
            <form class="form-cadastro" method="POST" action="Cadastro.php">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" name="matricula" required>

                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" id="data-nascimento" name="data_nascimento" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="confirmar-senha">Confirmar Senha:</label>
                <input type="password" id="confirmar-senha" name="confirmarsenha" required>

                <input type="submit" value="Cadastrar" class="btn-1" name="BT1">
            </form>
        </div>
    </div>
</body>
</html>
