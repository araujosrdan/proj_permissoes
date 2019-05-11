<?php
    try {
        $pdo = new PDO("mysql:dbname=proj_permissoes;host=localhost", "root", "");
    } catch (PDOExpection $e) {
        echo "Erro: " . $e->getMessage();
        exit();
    }
?>