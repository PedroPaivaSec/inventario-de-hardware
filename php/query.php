 <?php

declare(strict_types=1);

    function loginValidate(PDO $pdo): array
    {
        $query = "SELECT id, senha_hash FROM usuarios WHERE usuario = :nome";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nome' => $_POST['username']
        ]);
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }
