<?php

require_once __DIR__ . "/php/requires.php";
var_dump($_SESSION);

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
            <label for="username">Usuário:</label>
            <input type="text" name="username" placeholder="Digite seu usuário" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" placeholder="Digite sua senha" required>

            <button type="submit">Entrar</button>
        </form>

    </main>

</body>
</html>
