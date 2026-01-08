<?php

// (Re)Iniciar sessão
session_start();

// Caso não haja uma sessão autenticada ou não exista um valor ID guardado na sessão
if (!isset($_SESSION['id'])) {
    header("Location: index.php?autentica=1");
    exit(); 
}
?>