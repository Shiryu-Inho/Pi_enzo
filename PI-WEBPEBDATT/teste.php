    <!--- PHP --->
    <?php
    session_start();
    extract($_POST);
    include "function.php";

    if (isset($BT1)) {
        $matricula = trim($matricula);
        $nome = trim($nome) . ' '; 
        $senha = trim($senha);
        $confirmarsenha = trim($confirmarsenha);
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