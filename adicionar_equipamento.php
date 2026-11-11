<?php

require_once __DIR__ . "/php/requires.php";
travaLogin();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Adicionar equipamento</title>
</head>
<body>

    <header class="sidebar">
        <h1>Inventário de Hardware</h1>

        <nav>
            <a href="index.php">Início</a>
            <a href="equipamentos.php">Equipamentos</a>
            <a href="adicionar_equipamento.php" class="active">Adicionar equipamento</a>
            <form class="logout" action="/php/logout.php" method="POST">
                <button class="logout-button" type="submit">Sair</button>
            </form>
        </nav>

        <footer>
            <p>Inventário de Hardware © 2026</p>
        </footer>
    </header>

    <main>
        <div class="page-header">
            <h1>Adicionar equipamento</h1>
            <p>Cadastre um novo aparelho recebido</p>
        </div>

        <form action="novo_equip.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <input type="text" id="cliente" name="cliente" placeholder="Nome do cliente" required>
            </div>

            <div class="form-group">
                <label for="equipamento">Equipamento:</label>
                <input type="text" id="equipamento" name="equipamento" placeholder="Ex: Notebook Dell Inspiron" required>
            </div>

            <div class="form-group">
                <label for="problema">Problema relatado:</label>
                <input type="text" id="problema" name="problema" placeholder="Ex: Não liga, tela quebrada" required>
            </div>

            <div class="form-group">
                <label for="imagem">Selecione uma imagem</label>
                <input type="file" id="imagem" name="foto" accept="image/jpeg, image/png, image/webp">
            </div>

            <button type="submit">Cadastrar equipamento</button>

        </form>

    </main>

</body>
</html>
