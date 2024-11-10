<?php
session_start(); // Inicia uma sessão para armazenar dados que podem ser acessados em diferentes páginas.

extract($_POST); // Extrai variáveis de um array associativo ($_POST), criando variáveis com os mesmos nomes das chaves.

include "function.php"; // Inclui o arquivo "function.php" que contém funções que podem ser utilizadas no código, como a função `banco`.

if (isset($BT1)) { // Verifica se a variável `$BT1` foi definida, indicando que o botão de cadastro foi clicado.
    $matricula = trim($matricula); // Remove espaços em branco do início e fim da variável `$matricula`.
    $nome = trim($nome); // Remove espaços em branco do início e fim da variável `$nome`.
    $senha = trim($senha); // Remove espaços em branco do início e fim da variável `$senha`.
    $confirmarsenha = trim($confirmarsenha); // Remove espaços em branco do início e fim da variável `$confirmarsenha`.

    if ($senha === $confirmarsenha) { // Verifica se a senha e a confirmação da senha são iguais.
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // Cria um hash da senha para armazenamento seguro no banco de dados.

        // Comando SQL para inserir um novo usuário na tabela `usuario`.
        $incluir = "INSERT INTO `usuario` (`matricula`, `username`, `data_nascimento`, `senha`) 
                    VALUES ('$matricula', '$nome', '$data_nascimento', '$senhaHash')";

        // Chama a função `banco` para executar o comando SQL e inserir o usuário.
        // A função recebe parâmetros de conexão e o comando SQL.
        $resultado = banco("localhost", "root", NULL, "pinovo", $incluir);

        if ($resultado) { // Verifica se a inserção foi bem-sucedida.
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