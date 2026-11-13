<?php

require_once __DIR__ . "/php/requires.php";
travaLogin();

try {
    $equip = listarEquipamentos($pdo);
} catch (PDOException $e) {
    error_log("Falha ao realizar consulta: " . $e->getMessage());
    die("Falha ao carregar as tarefas.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Equipamentos</title>
</head>

<body>

    <header class="sidebar">
        <h1>Inventário de Hardware</h1>

        <nav>
            <a href="index.php">Início</a>
            <a href="equipamentos.php" class="active">Equipamentos</a>
            <a href="adicionar_equipamento.php">Adicionar equipamento</a>
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
            <h1>Equipamentos</h1>
            <p>Lista dos aparelhos em atendimento</p>
        </div>
        <?php if (empty($equip)) : ?>
            <p class='flash'>Nenhuma equipamento disponivel.</p>
            <?php else :
            foreach ($equip as $equipamento) : ?>
                <div class="equipment-list">

                    <div class="equipment-item">
                        <img src="img/notebook.jpg" alt="Notebook Dell" class="equipment-photo">
                        <div class="equipment-info">
                            <span class="equipment-title">Notebook Dell — Maria Souza</span>
                            <span class="equipment-desc">Troca de tela</span>
                        </div>
                        <span class="status">Pronto</span>
                    </div>

                    <div class="equipment-item">
                        <img src="img/pcgamer.jpg" alt="PC Gamer" class="equipment-photo">
                        <div class="equipment-info">
                            <span class="equipment-title">PC Gamer — João Ferreira</span>
                            <span class="equipment-desc">Formatação</span>
                        </div>
                        <span class="status">Em conserto</span>
                    </div>

                    <div class="equipment-item">
                        <img src="img/celular.jpg" alt="Celular Samsung" class="equipment-photo">
                        <div class="equipment-info">
                            <span class="equipment-title">Celular Samsung — Ana Lima</span>
                            <span class="equipment-desc">Troca de bateria</span>
                        </div>
                        <span class="status">Recebido</span>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>

</body>

</html>