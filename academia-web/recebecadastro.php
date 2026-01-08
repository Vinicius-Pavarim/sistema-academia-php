<?php

include "includes/autentica.php";

    //Abre conexão com o MySQL
    $conn = mysqli_connect("localhost", "root", "", "academia");

    if($conn == false){
        die("ERRO: Não conectou com o BD!");
    }

    //Recebe os dados enviados via POST pelo formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
	$senha = $_POST['senha'];

    //INSERÇÃO
    if(empty($id)){

        //Monta o código SQL para inserir o usuário
        $sql = "INSERT INTO usuarios (nome, email, senha) 
                VALUES 
                ('$nome', '$email', '$senha')";

        //Envia o código SQL ao MySQL
        $res = mysqli_query($conn, $sql);

        //Se a inserção deu certo
        if($res){
            header("Location: cadusuarios.php");
            echo '<p stle="text-align:center;color:green">SUCESSO AO INSERIR!</p>';
        }
        else{
            echo '<p stle="text-align:center;color:red">ERRO AO INSERIR!</p>';
        }

    }
    else{

        //Monta o SQL com os campos enviados pelo usuário
		$sql = "UPDATE usuarios SET 
            nome = '$nome',
            email = '$email',
            senha = '$senha',
        WHERE
            id = $id";
        

    //Envia código SQL ao MySQL (enviando sql para atualizar usuário)
    $res = mysqli_query($conn, $sql);

    //Se SQL executou sem erros (se atualizou no BD)
    if($res){
    header("Location: cadusuarios.php");
    echo '<p style="text-align:center;color:green">SUCESSO!</p>';
    }
    else{
    echo '<p style="text-align:center;color:red">ERRO!</p>';
    }

    }

?>