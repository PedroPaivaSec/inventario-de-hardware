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
            <?php else : ?>
                <div class="equipment-list">
            <?php foreach ($equip as $equipamento) : ?>

                    <div class="equipment-item">
                        <img src="img/<?php echo htmlspecialchars($equipamento['imagem'], ENT_QUOTES, 'UTF-8'); ?>" alt="Notebook Dell" class="equipment-photo">
                        <div class="equipment-info">
                            <span class="equipment-title"><?php echo htmlspecialchars($equipamento['equipamento'], ENT_QUOTES, 'UTF-8') . " - " . htmlspecialchars($equipamento['cliente'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="equipment-desc"><?php echo htmlspecialchars($equipamento['problema'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                        <span class="status"><?php echo htmlspecialchars($equipamento['status'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>

                    <?php endforeach; ?>
                </div>
        <?php endif; ?>
    </main>

</body>

</html>