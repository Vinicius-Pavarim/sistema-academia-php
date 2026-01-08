<?php

include "includes/autentica.php";

	 //Abre conexão com o MySQL
	 $conn = mysqli_connect("localhost", "root", "", "academia");

	 if($conn == false){
		 die("ERRO: Não conectou com o BD!");
	 }

	 $id = "";
	 $nome = "";
	 $cpf = "";
	 $telefone = "";
	 $dtnasc = "";
	 $genero = "";

	 //Se existir GET de ID
	 //Se a tela esta sendo aberta para edição
	 if(isset($_GET['id'])){

		//Obtém o parametro ID que foi enviado via GET
		$id = $_GET['id'];

		//Monta o comando SQL para buscar as informações cadastradas
		$sql = "SELECT * FROM alunos WHERE id = $id";

		//Envio da consulta ao MySQL
		$res = mysqli_query($conn, $sql);
		//Armazena o registro encontrado
		$row = mysqli_fetch_assoc($res);

		//Guarda os valores nas variáveis
		$nome = $row['nome'];
		$cpf = $row['cpf'];
		$telefone = $row['telefone'];
		$dtnasc = $row['dtnasc'];
		$genero = $row['genero'];

	 }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>MeuLab - Área restrita - Cadastro de alunos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Cadastro de alunos</h2>
		</header>
		
		<section>
		  <nav>
			<ul id="menu">
				<li><a href="inicio.php">Inicio</a></li>
				<li><a href="cadusuarios.php">Cad. usuários</a></li>
				<li><a href="cadalunos.php" class="active">Cad. alunos</a></li>
				<li><a href="cadprofessores.php">Cad. professores</a></li>
			</ul>
		  </nav>
		  
		  <article>
		  
			<form action="recebealuno.php" method="post">
			
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
			
				<label for="nome">Nome</label> 
				<input type="text" name="nome" value="<?php echo $nome; ?>" />
				

				<label for="cpf">CPF</label>
				<input type="text" name="cpf" value="<?php echo $cpf; ?>"  />
				
				
				<label for="telefone">Telefone/celular</label>
				<input type="text" name="telefone"  value="<?php echo $telefone; ?>"  />
				
				 
				<label for="dtnasc">Data de nascimento</label>
				<input type="date" name="dtnasc"  value="<?php echo $dtnasc; ?>"  />
				

				<label for="genero">Gênero</label>
				<select name="genero">
					<option>Selecione</option>
					<option <?php if($genero=="M"){echo "selected";} ?> >Masculino</option>
					<option <?php if($genero=="F"){echo "selected";} ?> >Feminino</option>
				</select>

				<input type="submit">
			
			</form>
			<a href="inicio.php">Voltar</a>
		  </article>
		</section>

		<footer>
		  <p>&copy; 2023 Todos os direitos reservados</p>
		</footer>
		
		
	</body>
</html>