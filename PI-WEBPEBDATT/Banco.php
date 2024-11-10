<?php
    $user = 'root';
    $senha = '';
    $db = 'pinovo';
    $host = 'localhost';

    $banco = new mysqli($host, $user, $senha, $db);

    if($banco->connect_errno){
        echo "Falha ao fazer a conexão de dados".$banco->error;
    } else {
        echo "Conexão efetuada com sucesso!";
    }
?>