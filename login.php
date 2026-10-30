<?php

require_once __DIR__ . "/php/requires.php";
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>

    <header class="sidebar">
        <h1>Inventário de Hardware</h1>

        <nav>
            <a href="login.php">Login</a>
        </nav>

        <footer>
            <p>Inventário de Hardware © 2026</p>
        </footer>
    </header>

    <main>
        <div class="page-header">
            <h1>Login</h1>
            <p>Acesse sua conta</p>
        </div>

        <form action="/php/loginBack.php" method="POST">
            <label>Usuário:</label>
            <input type="text" name="username" placeholder="Digite seu usuário" required>

            <label>Senha:</label>
            <input type="password" name="password" placeholder="Digite sua senha" required>

            <button type="submit">Entrar</button>
        </form>
        <div>
            <?php

            if (isset($flash['erro'])) {
                echo "<p class='flash'>" . htmlspecialchars($flash['erro'], ENT_QUOTES, 'UTF-8') . "</p>";
            }

            ?>
        </div>

    </main>

</body>

</html>