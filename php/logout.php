<?php

require_once __DIR__ . '/requires.php';
bloqueioPost();

session_unset();
session_destroy();
header('Location: ' . BASE_URL . '/login.php');
exit();
