<?php

declare(strict_types=1);

function travaLogin(): void
{

    if (!isset($_SESSION['user_name'])) {
        header("Location: ../login.php");
        exit;
    }
}

