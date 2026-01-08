<?php
include "includes/autentica.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Academia - Área restrita - Cadastro de professores</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Cadastro de professores</h2>
		</header>
		
		<section>
		  <nav>
			<ul id="menu">
          <li><a href="inicio.php">Inicio</a></li>
			    <li><a href="cadusuarios.php">Cad. usuários</a></li>
			    <li><a href="cadalunos.php">Cad. alunos</a></li>
			    <li><a href="cadprofessores.php" class="active">Cad. professores</a></li>
			</ul>
		  </nav>
		  
		  <article>
		  
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>NOME</td>
                    <td>CPF</td>
                    <td> - </td>
                    <td> - </td>
                </tr>
                <?php

                    //Abre conexão com o MySQL
                    $conn = mysqli_connect("localhost", "root", "", "academia");

                    if($conn == false){
                        die("ERRO: Não conectou com o BD!");
                    }

                    //Monta o comando SQL para buscar as informações cadastradas
                    $sql = "SELECT id, nome, cpf FROM professores";

                    //Envia código SQL ao MySQL (enviando sql para consultar professores)
					$res = mysqli_query($conn, $sql);

                    //Se deu certo e encontrou registros
                    if($res){

                        //Percorre os professores encontrados
                        while($row = mysqli_fetch_assoc($res)){
                            
                            echo " <tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['nome'] . "</td>
                                        <td>" . $row['cpf'] . "</td>
                                        <td><a href='cadprofessores.php?id=" . $row['id'] . "'>Editar</a></td>
                                        <td><a href='excluiprofessores.php?id=".$row['id']."'>Excluir</a></td>
                                    </tr>";

                        }

                    }

                ?>
            </table>


			<a href="inicio.php">Voltar</a>
		  </article>
		</section>

		<footer>
		  <p>&copy; 2023 Todos os direitos reservados</p>
		</footer>
		
		
	</body>
</html>