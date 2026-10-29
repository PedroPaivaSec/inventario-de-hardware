 <?php

require_once __DIR__ . "/requires.php";

    function loginValidate($pdo)
    {
        $query = "SELECT id, senha_hash FROM usuarios WHERE usuario = :nome";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nome' => $_POST['username']
        ]);
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }
