<?php
include "includes/autentica.php";

// Abre conexão com o MySQL
$conn = mysqli_connect("localhost", "root", "", "academia");

// Verifica a conexão
if (!$conn) {
    die("ERRO: Não conectou com o BD!");
}

// Recebe os dados enviados via POST pelo formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$dtnasc = $_POST['dtnasc'];
$genero = $_POST['genero'];

// INSERÇÃO
if (empty($id)) {

    // Monta o código SQL para inserir o aluno
    $sql = "INSERT INTO alunos (nome, cpf, telefone, dtnasc, genero) 
            VALUES 
            ('$nome', '$cpf', '$telefone', '$dtnasc', '$genero')";

    // Envio do código SQL ao MySQL
    $res = mysqli_query($conn, $sql);

    // Se a inserção foi bem-sucedida
    if ($res) {
        header("Location: listaalunos.php");
    } else {
        echo "ERRO AO INSERIR: " . mysqli_error($conn);
    }
} else {

    // Monta o SQL com os campos enviados pelo usuário
    $sql = "UPDATE alunos SET 
                nome = '$nome',
                cpf = '$cpf',
                telefone = '$telefone',
                dtnasc = '$dtnasc',
                genero = '$genero'
            WHERE
                id = $id";

    // Envio do código SQL ao MySQL (enviando sql para atualizar aluno)
    $res = mysqli_query($conn, $sql);

    // Se o SQL foi executado sem erros (se atualizou no BD)
    if ($res) {
        header("Location: listaalunos.php");
    } else {
        echo "ERRO AO ATUALIZAR: " . mysqli_error($conn);
    }
}

// Fechar a conexão
mysqli_close($conn);
?>
