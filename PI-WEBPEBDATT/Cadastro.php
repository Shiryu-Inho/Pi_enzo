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
            <form class="form-cadastro" method="POST" action="teste.php">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" placeholder="Matrícula" name="matricula" pattern="[0-9]{12}" title="Digite uma matrícula com 12 dígitos" required>

                <label for="nome">Nome:</label>
                <input type="text" id="nome" placeholder="Nome" name="nome" required>

                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" id="data-nascimento" name="data_nascimento" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Senha" name="senha" required>

                <label for="confirmar-senha">Confirmar Senha:</label>
                <input type="password" id="confirmar-senha" placeholder="Confirmar Senha" name="confirmarsenha" required>

                <input type="submit" value="Cadastrar" class="btn-1" name="BT1">
            </form>
        </div>
    </div>
</body>
</html>
