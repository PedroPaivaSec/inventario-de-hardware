<?php

require_once __DIR__ . "/php/requires.php";
travaLogin();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Início</title>
</head>
<body>

    <header class="sidebar">
        <h1>Inventário de Hardware</h1>

        <nav>
            <a href="index.php" class="active">Início</a>
            <a href="equipamentos.php">Equipamentos</a>
            <a href="adicionar_equipamento.php">Adicionar equipamento</a>
            <a href="login.php">Login</a>
        </nav>

        <footer>
            <p>Inventário de Hardware © 2026</p>
        </footer>
    </header>

    <main>
        <div class="page-header">
            <h1>Painel</h1>
            <p>Resumo do que está acontecendo</p>
        </div>

        <div class="equipment-list">

            <div class="equipment-item">
                <img src="img/notebook.jpg" alt="Notebook Dell" class="equipment-photo">
                <div class="equipment-info">
                    <span class="equipment-title">Notebook Dell — Maria Souza</span>
                    <span class="equipment-desc">Pronto para retirada</span>
                </div>
                <span class="status">Pronto</span>
            </div>

        </div>

    </main>

</body>
</html>
