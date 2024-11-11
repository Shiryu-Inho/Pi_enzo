<?php
session_start(); // Inicia uma sessão para armazenar dados que podem ser acessados em diferentes páginas.

extract($_POST); // Extrai variáveis de um array associativo ($_POST), criando variáveis com os mesmos nomes das chaves.

include "function.php"; // Inclui o arquivo "function.php" que contém funções que podem ser utilizadas no código, como a função `banco`.

include "Banco.php";

if (isset($BT1)) { // Verifica se a variável `$BT1` foi definida, indicando que o botão de cadastro foi clicado.
    $matricula = trim($_POST['matricula']); // Remove espaços em branco do início e fim da variável `$matricula`.
    $nome = trim($_POST['nome']); // Remove espaços em branco do início e fim da variável `$nome`.
    $senha = trim($_POST['senha']); // Remove espaços em branco do início e fim da variável `$senha`.
    $confirmarsenha = trim($_POST['confirmarsenha']); // Remove espaços em branco do início e fim da variável `$confirmarsenha`.

    // Verifica se a matrícula já existe no banco de dados
    $consulta = "SELECT COUNT(*) FROM `usuario` WHERE `matricula` = '$matricula'";

    // Executa a consulta ao banco de dados e armazena o resultado
    $resultado = $banco->query($consulta);

    // Verifica se a consulta foi executada com sucesso
    if ($resultado) {
        // Obtém o número de linhas retornado pela consulta
        $row = $resultado->fetch_row();

        if ($row[0] > 0) {
            // Caso a matrícula já exista, define a mensagem de erro na sessão e redireciona para a página de cadastro
            $_SESSION['cadastro_erro'] = "A matrícula já está cadastrada.";
            header("Location: Cadastro.php");
            exit;
        }
    } else {
        // Em caso de erro na execução da consulta, exibe uma mensagem de erro
        echo "Erro ao consultar o banco de dados: " . $banco->error;
        exit;
    }

    if ($senha === $confirmarsenha) { // Verifica se a senha e a confirmação da senha são iguais.
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // Cria um hash da senha para armazenamento seguro no banco de dados.

        // Comando SQL para inserir um novo usuário na tabela `usuario`.
        $incluir = "INSERT INTO `usuario` (`matricula`, `username`, `data_nascimento`, `senha`) 
                    VALUES ('$matricula', '$nome', '$data_nascimento', '$senhaHash')";

        // Chama a função `banco` para executar o comando SQL e inserir o usuário.
        // A função recebe parâmetros de conexão e o comando SQL.
        $resultado = banco("localhost", "root", NULL, "pinovo", $incluir);

        if ($resultado) { 
            // Verifica se a inserção foi bem-sucedida.
            header("Location: Login.php"); // Se foi bem-sucedida ele ira redirecionar o usuário para a página de login.
            exit; // Interrompe o script após o redirecionamento.
        } else {
            echo "<p>Erro ao cadastrar. Verifique os dados e tente novamente.</p>"; // Se caso não for ele exibe uma mensagem de erro caso a inserção falhe.
        }
    } else {
        // Se as senhas não coincidirem, salva uma mensagem de erro na sessão e redireciona para a página de cadastro.
        $_SESSION['cadastro_erro'] = "As senhas não coincidem.";
        header("Location: Cadastro.php"); // Redireciona o usuário para a página de cadastro.
        exit; // Interrompe o script após o redirecionamento.
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

<body class="Cadastro">

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
                // Verifica se a sessão 'cadastro_erro' existe. 
                // Essa sessão é geralmente utilizada para armazenar mensagens de erro 
                // durante o processo de cadastro.
                if (isset($_SESSION['cadastro_erro'])) {
                    // Se a sessão existir, imprime o valor armazenado nela. 
                    // A função print_r() é utilizada para exibir o conteúdo de uma variável, 
                    // que neste caso pode ser uma string ou um array com várias mensagens.
                    echo "<p style='color: red; font-weight: bold; text-align: top;'>" . $_SESSION['cadastro_erro'] . "</p>";

                    // Após exibir a mensagem de erro, remove a sessão 'cadastro_erro'.
                    // Isso evita que a mesma mensagem seja exibida repetidamente em 
                    // futuras requisições.
                    unset($_SESSION['cadastro_erro']);
                }
            ?>
            <form class="form-cadastro" method="POST" action="Cadastro.php">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" placeholder="Matrícula" name="matricula" pattern="[0-9]{12}"
                    title="Digite uma matrícula com 12 dígitos" required>

                <label for="nome">Nome:</label>
                <input type="text" id="nome" placeholder="Nome" name="nome" required>

                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" id="data-nascimento" name="data_nascimento" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Senha" name="senha" required>

                <label for="confirmar-senha">Confirmar Senha:</label>
                <input type="password" id="confirmar-senha" placeholder="Confirmar Senha" name="confirmarsenha"
                    required>

                <input type="submit" value="Cadastrar" class="btn-1" name="BT1">
            </form>
        </div>
    </div>
</body>

</html>