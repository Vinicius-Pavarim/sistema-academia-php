<?php

$email = $_POST["email"];
$senha = $_POST["senha"];

// Abre conexão com o MySQL
$conn = mysqli_connect("localhost", "root", "", "academia");

if($conn == false){
    die("ERRO: Não conectou com o BD!");
}

// Proteção contra SQL injection
$email = mysqli_real_escape_string($conn, $email);
$senha = mysqli_real_escape_string($conn, $senha);

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$res = mysqli_query($conn, $sql);

// Obtém quantidade de registros encontrados
$qtdeRegistros = mysqli_num_rows($res);

// Encontrou login e senha compatíveis
if ($qtdeRegistros > 0) {

    // Inicia a sessão
    session_start();

    // Obtém dados do usuário
    $row = mysqli_fetch_assoc($res);

    // Armazena informações do usuário na sessão
    $_SESSION['id'] = $row['id'];
    $_SESSION['nome'] = $row['nome'];

    header("Location: inicio.php");
} else {
    header("Location: index.php?erro=1");
}

?>
