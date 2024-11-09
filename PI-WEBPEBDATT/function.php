<?php
function banco($server, $user, $password, $db, $consulta) {
    $banco = new mysqli($server, $user, $password, $db);

    if ($banco->connect_error) {
        echo "Falha de conexão: (" . $banco->connect_errno . ") - " . $banco->connect_error;
        echo "<a href='Cadastro.php'><button>Voltar</button></a>";
        return false;
    }

    if ($banco->query($consulta) === TRUE) {
        $banco->close();
        return true;
    } else {
        echo "Erro na execução da consulta: (" . $banco->errno . ") - " . $banco->error;
        echo "<a href='Cadastro.php'><button>Voltar</button></a>";
        $banco->close();
        return false;
    }
}
?>
