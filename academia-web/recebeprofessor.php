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
	$cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    //INSERÇÃO
    if(empty($id)){

        //Monta o código SQL para inserir o professor
        $sql = "INSERT INTO professores (nome, cpf, telefone) 
                VALUES 
                ('$nome', '$cpf', '$telefone')";

        //Envia o código SQL ao MySQL
        $res = mysqli_query($conn, $sql);

        //Se a inserção deu certo
        if($res){
            header("Location: listaprofessores.php");
        }
        else{
            echo "ERRO AO INSERIR!";
        }

    }
    else{

        //Monta o SQL com os campos enviados pelo usuário
		$sql = "UPDATE professores SET 
            nome = '$nome',
            cpf = '$cpf',
            telefone = '$telefone',
        WHERE
            id = $id";
        

    //Envia código SQL ao MySQL (enviando sql para atualizar professor)
    $res = mysqli_query($conn, $sql);

    //Se SQL executou sem erros (se atualizou no BD)
    if($res){
    header("Location: listaprofessores.php");
    //echo "SUCESSO!";
    }
    else{
    echo "ERRO!";
    }

    }